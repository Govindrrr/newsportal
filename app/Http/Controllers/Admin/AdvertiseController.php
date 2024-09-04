<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $advertises = Advertise::orderBy('id','desc')->get();
        return view('admin.advertise.index',compact('advertises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advertise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        
       $req->validate([
        "company_name"=>"required",
        "phone"=>"required|digits:10",
        "link"=>"required|"
       ]);
       $advertises = new Advertise();
       $advertises -> company_name = $req->company_name;
       $advertises -> phone = $req->phone;
       $advertises -> link = $req->link;
       
       if($req->hasFile('image')){
        $file = $req->file('image');
        $file_name = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images'), $file_name);


        $advertises->image = "images/" . $file_name;
       }
        $advertises->save();

        toast('You have created successfully !','success');
        return redirect()->route('advertise.index');

       

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $advertise = Advertise::find($id);
       return view('admin.advertise.edit', compact('advertise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
       $req->validate([
        "company_name"=>"required|max:255",
        "phone"=>"required|digits:10",
        "link"=>"required|max:255"
       ]);

       $advertise = Advertise::find($id);
       $advertise->company_name = $req->company_name;
       $advertise->phone = $req->phone;
       $advertise->link = $req->link;

       if($req->hasFile('image')){
        $file = $req->file('image');
        $file_name = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images',$file_name));

        $advertise->image = "images/". $file_name;
       }
       $advertise->update();
       toast('You have created successfully !','success');
       return redirect()->route('advertise.index');
       

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $advertise = Advertise::find($id);
        $advertise->delete();
        unlink(public_path($advertise->image));
        toast('You have created successfully !','success');
        return redirect()->route('advertise.index');
        

    }
}
