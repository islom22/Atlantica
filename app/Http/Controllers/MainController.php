<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Main;
use Illuminate\Http\Request;

class MainController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mains = Main::latest()
            ->paginate(10);

        return view('app.main.index', compact(
            'mains',
         
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
        $mains = Main::all();
        $lang = \App::getLocale();
        return view('app.main.create', compact(
            'mains',
            'languages',
            'lang'
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
        // @dd($data);  
        $request->validate([
            'title' => 'required|max:255',
        ]);
            // $data["img"] = "noimage";
        $project = Main::create($data);
        
            return redirect()->route('mains.index')->with('message', 'Main added successfully');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $mains = Main::find($id);
    //     $servicecategories = Main::with('category')->get();
    //     return view('app.mains.show',compact('mains','servicecategories'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $main = Main::findOrFail($id);
        $languages = Lang::all();
        $lang = \App::getLocale();
        // $image = ProductImage::all();
        return view('app.main.edit', compact(
            'main',
            'languages',
            'lang'
            // 'image'
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
            'title' => 'required',
        ]);

        $project =  Main::find($id);
        $project->title = $request->input('title');
        $project->link = $request->input('link');
        $project->update();
            // dd($project);
            return redirect()->route('mains.index')->with('message', 'Main edit successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mains = Main::find($id);
        $mains->delete();
        return back()->with('message', 'Main delete successfully');
    }

}
