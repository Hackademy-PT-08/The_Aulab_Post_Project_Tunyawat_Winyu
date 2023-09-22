<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Validation\Rules\Unique;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();

        return view('components.layout', [
            'categories' => $categories,
            'categoryId' => $categories->id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('addPost.addPost', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $imageId = uniqid();

        $article = new Article;

        $article->title = $request->title;
        $article->subtitle = $request->subtitle;
        $article->content = $request->content;
        $article->user_id = auth()->user()->id;
         
        if($request->file('image')){
            $article->image = 'image-painting-' . $imageId . '.' . $request->file('image')->extension();
            $article->imageId = $imageId;
            $filename = 'image-painting-' . $imageId . '.' . $request->file('image')->extension();
            $image = $request->file('image')->storeAs('public', $filename);
        }
        else{
            $article->image = '';
            $article->image_Id = '';
        }

        $article->save();

        $categories = $request->categories;

        $current_article = Article::find($article->id);
        
        foreach($categories as $categorie){

            $current_article->categories()->attach($categorie);
        }
            
        Alert::success('Congrats', 'Your post has been uploaded successfully');


        return redirect()->route('profile');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article, $id)
    {
        $article = Article::find($id);

        $categories = Categorie::all();
        
        if(auth()->user()->id == $article->user_id){
            return view('editPost.edit', [
                'article' => $article,
                'categories'=> $categories
            ]); 
        }
        else{
            return redirect()->route('homepage');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreArticleRequest $request, Article $article, $id)
    {

        $imageId = uniqid();
        $article = Article::find($id);

        if(auth()->user()->id == $article->user_id){
            $article->title = $request->title;
            $article->subtitle = $request->subtitle;
            $article->content = $request->content;
            $article->user_id = auth()->user()->id;

            if($request->file('image')){
                $article->image = 'image-painting-' . $imageId . '.' . $request->file('image')->extension();
                $article->ImageId = $imageId;
                $filename = 'image-painting-' . $imageId . '.' . $request->file('image')->extension();
                $image = $request->file('image')->storeAs('public', $filename);
            }

            $article->save();

                $current_article = Article::find($article->id);
                $allCategories = Categorie::all();


                // Deleted previously categories selected
                $current_article->categories()->detach();

                $categories = $request->categories;

                // Add the another categories
                foreach($categories as $categorie){

                    $current_article->categories()->attach($categorie);
                }

            Alert::success('Congrats', 'Your post has been successfully edited');

            return redirect()->route('profile', $id);
        }
        else{
            return redirect()->route('homepage');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article, $id)
    {
        $article = Article::find($id);

        $article->delete();

        return redirect()->route('profile');
    }
}
