<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;

class FrontendController extends Controller
{
    public function details_article(Category $category, $id){

        $article_detail = Article::find($id);

        return view('details-articles.details', compact('article_detail', 'category'));
    }
    
    public function homeArticles(Category $category){
        
        // $lastArticles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();

        return view('home.homepage');
    }

    public function latest(Category $category)
    {
        $lastArticles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();

        return view('home.homepage', compact('lastArticles', 'category'));
    }

    public function oldest(Category $category){

        $lastArticles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();

        return view('home.homepage', compact('lastArticles', 'category'));
    }

    public function workWithUs(){
        return view('workWithUs.work-with-us');
    }
}
