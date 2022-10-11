<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response    
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(10);
        $languages = Lang::all();
        return view('app.banner.index', compact(
            'banners',
            'languages'
        ));
    }

    /**
     * Show the form for creating a banner resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Lang::all();
        return view('app.banner.create', compact('languages'));
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
        // dd($request->all());

        $banners = new Banner();
        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/banners/', $filename);
            $banners->img = $filename;
        }
        $banners->title = $request->title;
        $banners->desc = $request->desc;
        $banners->link = $request->link;
        $banners->save();
        return redirect()->route('banners.index')->with('message', "Banner added Successfully");
    }

    public function delete_image_banners(Request $request)
    {
        // @dd($request);
        if (!$files = Banner::find($request->id)) {
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        $destination = 'uploads/banners/' . $files->img;
        if (File::exists($destination)) {
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

    public function upload_banners_image(Request $request)
    {

        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $banners = Banner::find($request->id);

        $file = $request->file('img');
        $extention = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $file->move('uploads/banners/', $filename);
        $banners->img = $filename;


        $banners->save();

        return redirect()->back()->with('message', 'Image upload Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $category = Banner::find($id);
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
        $banner = Banner::findOrFail($id);
        $languages = Lang::all();
        return view('app.banner.edit', compact('banner', 'languages'));
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
    

        $request->validate([
            // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'title.en' => 'required|min:1|max:255'
        ]);
        // @dd($request->all());

        $banner = Banner::find($id);
        $banner->title = $request->input('title');
        $banner->desc = $request->input('desc');
        $banner->link = $request->input('link');
        $banner->update();
        return redirect()->route('banners.index')->with('message', 'Banner edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banners = Banner::find($id);
        $destination = 'uploads/banners/' . $banners->img;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $banners->delete();
        return redirect()->back()->with('message', 'Banner delete Successfully');
    }
}
