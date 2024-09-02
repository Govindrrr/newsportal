<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::orderBy('id','desc')->get();
        // return $categories;
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
       $req->validate([
        "title"=>"required|",
        "nep_title"=>"required"
       ]);

       $Category = new Category();
       $Category->title = $req->title;
       $Category->slug = $req->title;
       $Category->nep_title = Str::slug($req->nep_title);
       $Category->save();

       toast('Your data Added Successfully!','success');

       return redirect()->route('category.index');
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
        //
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        //
        $req->validate([
            "title"=>"required|",
            "nep_title"=>"required"
           ]);
           $Category = Category::find($id);
           $Category->title = $req->title;
           $Category->nep_title = Str::slug($req->nep_title);
           $Category->slug = $req->title;
           $Category->update();
    
           toast('Your data updated Successfully!','success');
    
           return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $company = Category::find($id);
        $company->delete();

        return redirect()->back();
        toast('Data deleted !!','success');
    }
}
