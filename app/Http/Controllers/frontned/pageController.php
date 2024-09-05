<?php

namespace App\Http\Controllers\frontned;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
        $latest_news = Post::orderBy('id','desc')->first();        
        $newses = Post::orderBy('id','desc')->limit(4)->get();        

        $tranding_news = Post::orderBy('views','desc')->limit(4)->get();
        return view('frontend.home',compact('latest_news','tranding_news','newses'));
    }
}
