<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ArticleSearch extends Component
{

    public $search = '';

    public function render()
    {

        if($this->search !== ''){

            // $articles = Article::where('title', $this->search)->get();
            $articles = DB::table('articles')
            ->where('title', 'LIKE', '%', $this->search, '%')
            ->orWhere('subtitle', 'LIKE', '%', $this->search, '%')
            ->orWhere('content', 'LIKE', '%', $this->search, '%')
            ->orWhere('category', 'LIKE', '%', $this->search, '%')->get();

        }else{

            $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(1)->get();
        }

        return view('livewire.article-search', compact('articles'));
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
}
