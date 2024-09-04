<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
            "post_title"=>"required|max:255",
            "description"=>"required",
            "categories"=>"required|",
            "image"=>"required"

        ]);

        $posts = new Post();
        $posts->post_title = $req->post_title;
        $posts->description = $req->description;
        $posts->meta_keywords = $req->meta_keywords;
        $posts->meta_description = $req->meta_description;

        if($req->hasFile('image')){
            $file = $req->file('image');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $file_name);

            $posts->image = "images/" . $file_name;
            
        }
        // if ($req->hasFile('image')) {
        //     $file = $req->file('image');
        //     $file_name = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('images'), $file_name);
    
        //     $posts->image = "images/" . $file_name;
        // }
        $posts->save();
        $posts->Categorys()->attach($req->categories);
        toast('You have uploaded a post successfully !','success');
        return redirect()->route('post.index');

    
       

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
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        //
        $req->validate([
            "post_title"=>"required|max:255",
            "description"=>"required",
            "categories"=>"required|",
            "status"=>"required"

        ]);

        $posts = Post::find($id);
        $posts->post_title = $req->post_title;
        $posts->description = $req->description;
        $posts->status = $req->status;
        $posts->meta_keywords = $req->meta_keywords;
        $posts->meta_description = $req->meta_description;

        if($req->hasFile('image')){
            $file = $req->file('image');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $file_name);

            $posts->image = "images/" . $file_name;
            
        }
        $posts->update();
        $posts->Categorys()->sync($req->categories);
        toast('You have updated a post successfully !','success');
        return redirect()->route('post.index');

    
       

    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posts = Post::find($id);
        $posts->delete();
        unlink(public_path($posts->image));
       

        return redirect()->back();
        toast('Data deleted !!','success');
    }
}
