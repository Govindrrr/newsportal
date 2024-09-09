<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    public function company(){
        $company = Company::first();
        // return response()->json($company);
        return new CompanyResource($company);

    }

    public function store(Request $req){
        try {
            $req->validate([
                "name"=>"required",
                "email"=>"required",
                "phone"=>"required",
                "address"=>"required",
                "pan"=>"required",
                "req_no"=>"required",
                "logo"=>"required"
            ]);


            $company = new Company();
            $company->name = $req->name;
            $company->email = $req->email;
            $company->phone = $req->phone;
            $company->address = $req->address;
            $company->reg_no = $req->reg_no;
            $company->facebook = $req->facebook;
            $company->youtube = $req->youtube;
            
            
            if($req->hasFile('logo')){
               $file = $req->logo;
               $fileName = time().'.'.$file->getClientOriginalExtension();
               $file->move(public_path('images',$fileName));
               $company->logo = "images/".$fileName;
            };

            $company->save();
            return response()->json([
                "success"=>false,
                "message"=>"Company Added successfully"
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                "success"=>false,
                "message"=>$e->errors()
            ]);

        }
    }
    public function update(Request $req, $id){
        $company = Company::find($id);
    }
}

