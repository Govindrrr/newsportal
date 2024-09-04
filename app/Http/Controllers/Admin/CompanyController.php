<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return to view company 
        $company = Company::first();
        // return $company;
        return view('admin.company.index',compact('company'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return to create view
        return view('admin.company.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        // Validate the input data

        // $req->validate([
        //     "name" => "required|max:255",
        //     "logo" => "required|",
        //     "email" => "required|email",
        //     "phone" => "required|digits:10",
        //     "address" => "required",
        //     "reg_no" => "required",
        //     "pan" => "required",
        //     "youtube" => "nullable|url",
        //     "facebook" => "nullable|url"
        // ]);
        
        // return $req;
        // // Save the company data
        $company = new Company();
        $company->name = $req->name;
        $company->email = $req->email;
        $company->reg_no = $req->reg_no;
        $company->pan = $req->pan;
        $company->address = $req->address;
        $company->phone = $req->phone;
        $company->youtube = $req->youtube;
        $company->facebook = $req->facebook;
    
        if ($req->hasFile('logo')) {
            $file = $req->file('logo');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $file_name);
    
            $company->logo = "images/" . $file_name;
        }
    
        $company->save();
        toast('Your data Added Successfully!','success');

        return redirect()->route('company.index');
    
        // Redirect to the index route or wherever you need
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //view single data
        // return view('admin.company.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //return to edit view
        $company = Company::find($id);
       return view('admin.company.edit', compact('company'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        //update date in db
          $company = Company::find($id);
          $company->name = $req->name;
          $company->email = $req->email;
          $company->reg_no = $req->reg_no;
          $company->pan = $req->pan;
          $company->address = $req->address;
          $company->phone = $req->phone;
          $company->youtube = $req->youtube;
          $company->facebook = $req->facebook;
      
          if ($req->hasFile('logo')) {
              $file = $req->file('logo');
              $file_name = time() . '.' . $file->getClientOriginalExtension();
              $file->move(public_path('images'), $file_name);
      
              $company->logo = "images/" . $file_name;
          }
      
          $company->update();
          toast('Your updated successfully !','success');
          return redirect()->route('company.index');

          
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        $company->delete();
        unlink(public_path($company->logo));
       

        return redirect()->back();
        toast('Data deleted !!','success');
        //delete data from db
    }
}
