<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::latest()->paginate(10);
        return view('app.partner.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.partner.create');
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
            'link' => 'required|min:1|max:255',
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // dd($request->title);

        $partner = new Partner();
        $partner->link = $request->link;
        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/partner/', $filename);
            $partner->img = $filename;
        }
        $partner->save();
        return redirect()->route('partners.index')->with('message', "Partner added successfully");
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

    public function delete_image_partner(Request $request)
    {
        // @dd($request);
        if (!$files = Partner::find($request->id)) {
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        $destination = 'uploads/partner/' . $files->img;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $files->update([
            'img' => null
        ]);
        return response()->json(["message"  =>  "Successfully deleted"], 200);
        // return redirect()->back()->with('message', 'Image Delete Successfully');

    }

    public function upload_partner_image(Request $request)
    {

        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $partner = Partner::find($request->id);

        $file = $request->file('img');
        $extention = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $file->move('uploads/partner/', $filename);
        $partner->img = $filename;


        $partner->save();
        return redirect()->back()->with('message', 'Image upload successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view ('app.partner.edit',compact('partner'));
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

            'link' => 'required|min:1|max:255'
        ]);

        $partner = Partner::find($id);

        $partner->link = $request->link;
        $partner->update();
        return redirect()->route('partners.index')->with('message', 'Partner edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->delete();
        return redirect()->back()->with('message', 'Partner delete successfully');
    }
}
