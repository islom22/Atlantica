<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\News;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class NewController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response    
     */
    public function index()
    {
        $news = News::latest()->paginate(10);
        $languages = Lang::all();
        return view('app.new.index', compact(
        'news',
        'languages'
    ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Lang::all();
        return view('app.new.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title.en' => 'required|min:1|max:255',
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // dd($request->title);

        $news = new News();
        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/news/', $filename);
            $news->img = $filename;
        }
        $news->title = $request->title;
        $news->desc = $request->desc;
        $news->date = $request->date;
        $news->save();
        return redirect()->route('news.index')->with('message', "News added successfully");
    }

    public function delete_image_news(Request $request){
        // @dd($request);
        if(!$files = News::find($request->id)){
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        $destination = 'uploads/news/'.$files->img;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $files->update([
            'img' => null
        ]);

        return response()->json(['status' => 'success', 'data' => $files]);
        // return response()->json([
        //     'success' => 'Image deleted successfully!'
        // ]);
        // return redirect()->back()->with('message', 'Image Delete Successfully');    
        
    }

    public function upload_news_image(Request $request)
    {
        
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $news = News::find($request->id);

        $file = $request->file('img');
        $extention = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $file->move('uploads/news/', $filename);
        $news->img = $filename;


        $news->save();

        return redirect()->back()->with('message', 'Image upload successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $category = News::find($id);
        // return view('app.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::findOrFail($id);
        $languages = Lang::all();
        return view('app.new.edit', compact('new', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'title.en' => 'required|min:1|max:255'
        ]);

        $news = News::find($id);
        // if ($request->hasfile('img')) {
        //     $file = $request->file('img');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extention;
        //     $file->move('uploads/news/', $filename);
        //     $news->img = $filename;
        // }
        $news->title = $request->title;
        $news->desc = $request->desc;
        $news->date = $request->date;
        $news->update();
        return redirect()->route('news.index')->with('message', 'News edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $destination = 'uploads/news/' . $news->img;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $news->delete();
        return redirect()->back()->with('message', 'News delete successfully');
    }
}
