<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lang;
use App\Models\Query;
use Illuminate\Support\Facades\File;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response    
     */
    public function index()
    {
        $querys = Query::latest()->paginate(10);
        $languages = Lang::all();
        return view('app.query.index', compact(
        'querys',
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
        return view('app.query.create', compact('languages'));
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
            'question.en' => 'required|min:1|max:255',
        ]);
        // dd($request->title);

        $query = new Query();
        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/query/', $filename);
            $query->img = $filename;
        }
        $query->question = $request->question;
        $query->answer = $request->answer;
        $query->save();
        return redirect()->route('querys.index')->with('message', "Query added successfully");
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
        $query = Query::findOrFail($id);
        $languages = Lang::all();
        return view('app.query.edit', compact('query', 'languages'));
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
            'question.en' => 'required|min:1|max:255'
        ]);

        $news = Query::find($id);
        $news->question = $request->question;
        $news->answer = $request->answer;
        $news->update();
        return redirect()->route('querys.index')->with('message', 'Query edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Query::find($id);
        $destination = 'uploads/query/' . $query->img;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $query->delete();
        return redirect()->back()->with('message', 'Query delete successfully');
    }
}
