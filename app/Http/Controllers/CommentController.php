<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Lang;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response    
     */
    public function index()
    {
        $comments = Comment::latest()->paginate(10);
        $languages = Lang::all();
        return view('app.comment.index', compact(
        'comments',
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
        return view('app.comment.create', compact('languages'));
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
            'title.en' => 'required|min:1|max:255'
        ]);
        // dd($request->title);

        $comment = new Comment();
        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/comment/', $filename);
            $comment->img = $filename;
        }
        $comment->title = $request->title;
        $comment->desc = $request->desc;
        $comment->date = $request->date;
        $comment->save();
        return redirect()->route('comments.index')->with('message', "Comment added successfully");
    }

    public function delete_image_comment(Request $request){
        // @dd($request);
        if(!$files = Comment::find($request->id)){
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        $destination = 'uploads/comment/'.$files->img;
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

    public function upload_comment_image(Request $request)
    {
        
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $comment = Comment::find($request->id);

        $file = $request->file('img');
        $extention = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $file->move('uploads/comment/', $filename);
        $comment->img = $filename;


        $comment->save();

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
        // $category = Comment::find($id);
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
        $comment = Comment::findOrFail($id);
        $languages = Lang::all();
        return view('app.comment.edit', compact('comment', 'languages'));
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
            'title.en' => 'required|min:1|max:255'
        ]);

        $comment = Comment::find($id);
        $comment->title = $request->title;
        $comment->desc = $request->desc;
        $comment->date = $request->date;
        $comment->update();
        return redirect()->route('comments.index')->with('message', 'Comment edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $destination = 'uploads/comment/' . $comment->img;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $comment->delete();
        return redirect()->back()->with('message', 'Comment delete successfully');
    }
}
