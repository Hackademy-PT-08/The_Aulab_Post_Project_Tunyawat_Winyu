<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homeArticles(Category $category, Request $request){
        
        $lastArticles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();

        return view('home.homepage', compact('lastArticles', 'category'));
    }

    public function searchArticle(Request $request){

        $key = $request->input('key');
        
        $articles = Article::search($key)->where('is_accepted', true)->get();
        
        return view('article-search.articles', compact('articles', 'key'));
    }
}
