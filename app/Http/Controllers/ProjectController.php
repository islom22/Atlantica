<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('projectImage')
            ->paginate(10);

        return view('app.project.index', compact(
            'projects',
         
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
        $projects = Project::all();
        $lang = \App::getLocale();
        return view('app.project.create', compact(
            'projects',
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

    public function uploadImage(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $project = Project::find($request->id);
        $item = $request->file('img');
        if ($request->hasFile('img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($item->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $uploade_path = 'upload/project/';
            $image_url = $uploade_path . $image_full_name;
            $item->move($uploade_path, $image_full_name);

            ProjectImage::create([
                'img' => $image_url,
                'project_id' => $project->id
            ]);
            return response()->json(["message"  =>  "Image upload successfully"], 200);
            // return redirect()->back()->with('message', 'Image Upload Successfully');
        }
        // return redirect()->back()->withErrors('message', 'Image Upload Error');
        return response()->json(["message"  =>  "Image upload successfully"], 200);
    }

    public function deleteImage(Request $request){

        if(!$files =  ProjectImage::find($request->id)){
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        // @dd('sdfsdfs');
        $destination = 'upload/project/'.$files->img;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $files->delete();
        return response()->json(["message"  =>  "Successfully deleted"], 200);
        // return redirect()->back()->with('message', 'Image Delete Successfully');
        }

    public function store(Request $request)
    {
        $data = $request->all();
        // @dd($data);  
        $request->validate([
            'title' => 'required|max:255',
            // 'serviceCategory' => 'required',
            'img.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img' => 'required'
        ]);
            // $data["img"] = "noimage";
        $project = Project::create($data);
        
        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $item) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($item->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $uploade_path = 'upload/project/';
                $image_url = $uploade_path . $image_full_name;
                $item->move($uploade_path, $image_full_name);

                ProjectImage::create([
                    'img' => $image_url,
                    'service_id' => $project->id
                ]);
            }

            return redirect()->route('projects.index')->with('message', 'Project added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $projects = Project::find($id);
    //     $servicecategories = Project::with('category')->get();
    //     return view('app.projects.show',compact('projects','servicecategories'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::with('projectImage')->findOrFail($id);
        $languages = Lang::all();
        $lang = \App::getLocale();
        // $image = ProductImage::all();
        return view('app.project.edit', compact(
            'project',
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
            // 'serviceCategory_id' => 'required',
            // 'img.*' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'img' => 'required'
        ]);

        $project =  Project::find($id);
        $project->title = $request->input('title');
        $project->subtitle = $request->input('subtitle');
            $project->update();
            // dd($project);
            return redirect()->route('projects.index')->with('message', 'Project edit successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projects = Project::find($id);
        $destination = 'uploads/project/' . $projects->img;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $projects->delete();
        return back()->with('message', 'Project delete successfully');
    }

}
