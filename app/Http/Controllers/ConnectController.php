<?php

namespace App\Http\Controllers;

use App\Models\Connect;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Connect::latest()->paginate(10);
        return view('app.connect.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applications = Connect::all();
        return view('app.connect.create',compact('applications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        
         ]);

        $application = new Connect();
        $application->name = $request->input('name');
        $application->email = $request->input('email');
        $application->text = $request->input('text');
        $application->message = $request->input('message');
        $application->save();
        return redirect()->route('applications.index')->with('message','Application added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $products = Product::find($id);
        // $categories = Product::with('category')->get();
        // return view('app.products.show',compact('products','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Connect::find($id);
        return view('app.connect.edit',compact('application'));
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
            'name' => 'required',
            'email' => 'required'
 
         ]);    

        $application =  Connect::find($id);
        $application->name = $request->input('name');
        $application->email = $request->input('email');
        $application->text = $request->input('text');
        $application->message = $request->input('message');
        $application->update();
        return redirect()->route('applications.index')->with('message','Application edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = Connect::find($id);
        $application->delete();
        return back()->with('message','Application delete Successfully');
    }
}
