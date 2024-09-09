<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function categories(){
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }
    public function latest_news(){
        $latest_news = Post::orderBy('id','desc')->limit(8)->first();
        return new PostResource($latest_news);
    }
    public function trand_news(){
        $trand_news = Post::where('status','approved')->orderBy('views','desc')->limit(5)->get();
        return PostResource::collection($trand_news);
    }

    public function category($slug){
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts;
        return PostResource::collection($posts);
    }
    public function post($id){
        
        $post = Post::find($id);
        if($post){
            return new PostResource($post);
        }
        else{
            return response()->json([
                "request"=> false,
                "message"=>"Page not found"
                
            ]);
        }
      
    }
    
}


