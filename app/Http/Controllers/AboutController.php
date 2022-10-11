<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class   AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::latest()->paginate(10);
        $languages = Lang::all();
        return view('app.about.index', compact(
            'about',
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
        return view('app.about.create',compact(
            'languages'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
    //   @dd($data);
        $request->validate([
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required',
    
        ]);

        $about = new About();
        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file = $request->file('img');
            $file->move('uploads/about/', $filename);
            $about->img = $filename;
        }
        $about->address1 = $request->input('address1');
        $about->address2 = $request->input('address2');
        $about->phone = $request->input('phone');
        $about->twitter = $request->input('twitter');
        $about->linkedin = $request->input('linkedin');
        $about->instagram = $request->input('instagram');
        $about->facebook = $request->input('facebook');
        $about->skype = $request->input('skype');
        $about->desc = $request->input('desc');
        $about->title = $request->input('title');
        $about->email = $request->input('email');
        $about->save();

        return redirect()
            ->route('abouts.index')
            ->with([
                'message' => 'Successfully added!'
            ]);
    }

    public function delete_image_about(Request $request)
    {
        // dd($request->id);
        if(!$files = About::find($request->id)){
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        $destination = 'uploads/about/'.$files->img;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $files->update([
            'img' => null
        ]);
        return redirect()->back()->with('message', 'Image delete Successfully');
        
    }

    public function upload_about_image(Request $request)
    {
      
        $about = About::find($request->id);

        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/about/', $filename);
            $about->img = $filename;
        }

        $about->save();

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $languages = Lang::all();
        $about = About::find($id);
        return view('app.about.edit', compact(
            'about',
            'languages'
        ));
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
            'phone' => 'required'
    
        ]);

        $about = About::find($id);

        $about->address1 = $request->input('address1');
        $about->address2 = $request->input('address2');
        $about->phone = $request->input('phone');
        $about->twitter = $request->input('twitter');
        $about->linkedin = $request->input('linkedin');
        $about->instagram = $request->input('instagram');
        $about->facebook = $request->input('facebook');
        $about->skype = $request->input('skype');
        $about->desc = $request->input('desc');
        $about->title = $request->input('title');
        $about->email = $request->input('email');
        $about->update();

        return redirect()->route('abouts.index')->with(['message' => 'Successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::find($id)->delete();

        return redirect()->route('abouts.index')->with(['message' => 'Successfully deleted!']);
    }
}
