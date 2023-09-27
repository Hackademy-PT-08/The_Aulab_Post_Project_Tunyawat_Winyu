<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard(){

        $articles = Article::where('is_accepted', false)->get();
        
        return view('revisor.dashboard', compact('articles'));
        
    }

    public function articleDetail(Article $article){

        return view('revisor.articleDetail', compact('article'));
    }

    public function articleAccept(Article $article){

        $article->is_accepted = true;
        $article->save();

        return redirect()->route('revisor.dashboard');
    }

    public function articleReject(Article $article){

        $article->is_accepted = false;
        $article->save();

        return redirect()->route('revisor.dashboard');
    }
}
