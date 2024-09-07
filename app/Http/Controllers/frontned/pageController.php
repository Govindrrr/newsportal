<?php

namespace App\Http\Controllers\frontned;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PhpParser\Node\Expr\FuncCall;

class pageController extends Controller
{
    //
    public function __construct()
    {
        $company = Company::first();
        $categories = Category::all();
        View::share([
            "company"=>$company,
            "categories"=>$categories,
        ]);
    }

    public function home(){
        $latest_news = Post::where('status','approved')->orderBy('id','desc')->first();        
        $newses = Post::where('status','approved')->orderBy('id','desc')->limit(4)->get();        

        $tranding_news = Post::where('status','approved')->orderBy('views','desc')->limit(4)->get();
        return view('frontend.home',compact('latest_news','tranding_news','newses'));
    }
    public function category($slug){
        $category = Category::where('slug', $slug)->first();
        $posts = $category->Posts()->paginate(2);

        $advertise = Advertise::where('status','1')->get();
        return view('frontend.category',compact('posts','advertise','category'));
    }

    public function news($id){
        $news = Post::find($id);
        $news->increment('views');

        $advertise = Advertise::where('status','1')->get();
        return view('frontend.news',compact('advertise','news'));
    }
    public function search(Request $req){
       $q = $req->q;
       $advertise = Advertise::where('status','1')->get();
       $news = Post::where('post_title','like','%'.$q.'%')->first();
       return view('frontend.news',compact('advertise','news'));
    }
}
