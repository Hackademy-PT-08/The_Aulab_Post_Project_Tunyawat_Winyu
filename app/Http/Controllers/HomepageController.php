<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Homepage;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(){
        $lastArticles = Article::latest('created_at')->take(3)->get();
        
        // $lastArticles = Article::all();

        return view('home.homepage', [
            'lastArticles' => $lastArticles,
        ]);
    }

    // public function latest($id)
    // {
    //     $lastArticles = Article::latest('created_at')->take(3)->get();
    //     $categories = Categorie::find($id);
    //     // $lastArticles = Article::all();

    //     return view('home.homepage', [
    //         'lastArticles' => $lastArticles,
    //         'categoryName' => $categories->name
    //     ]);
    // }

    // public function oldest($id){

    //     $lastArticles = Article::oldest('created_at')->take(3)->get();
    //     $categories = Categorie::find($id);
    //     // $lastArticles = Article::all();

    //     return view('home.homepage', [
    //         'lastArticles' => $lastArticles,
    //         'categoryName' => $categories->name
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Homepage $homepage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Homepage $homepage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Homepage $homepage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Homepage $homepage)
    {
        //
    }
}
