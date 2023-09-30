<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Support\Facades\Auth;
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
        // $categories = Category::all();

        // return view('components.layout', [
        //     'categories' => $categories,
        //     'categoryId' => $categories->id
        // ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $tags = Tag::all();
        return view('addPost.addPost',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {


        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'image' => $request->file('image')->store('public/image'),
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id
        ]);

        // $tags = $request->tags;

        // foreach($tags as $tag){
        //     $article->tags()->attach($tag);
        // }

        $article->save();
            
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

        $categories = Category::all();

        // $tags = Tag::all();
        
        if(auth()->user()->id == $article->user_id){
            return view('editPost.edit', [
                'article' => $article,
                'categories'=> $categories,
                // 'tags' => $tags
            ]); 
        }
        else{
            return redirect()->route('homepage');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article, $id)
    {

        $image_id = uniqid();
        $article = Article::find($id);

        if(auth()->user()->id == $article->user_id){
            $article->title = $request->title;
            $article->subtitle = $request->subtitle;
            $article->content = $request->content;
            $article->user_id = auth()->user()->id;

            
            $article->save();
            
            if($request->file('image')){
                $article->image = 'image-painting-' . $image_id . '.' . $request->file('image')->extension();
                $filename = 'image-painting-' . $image_id . '.' . $request->file('image')->extension();
                $image = $request->file('image')->storeAs('public/image', $filename);
            }
        }

            Alert::success('Congrats', 'Your post has been successfully edited');

            return redirect()->route('profile', $id);
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
