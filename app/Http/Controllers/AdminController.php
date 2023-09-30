<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // view of candidate staff
    public function candidate_staff(){

        $adminRequest = User::where('is_admin', NULL)->get();
        $revisorRequest = User::where('is_revisor', NULL)->get();
        $writerRequest = User::where('is_writer', NULL)->get();

        return view('admin.candidate-request', compact('adminRequest', 'revisorRequest', 'writerRequest'));
    }

    public function makeUserAdmin(User $user){

        $user->is_admin = true;
        $user->save();
        
        return redirect()->route('admin.candidate-request');
    }

    public function makeUserRevisor(User $user){

        $user->is_revisor = true;
        $user->save();
        
        return redirect()->route('admin.candidate-request');
    }

    public function makeUserWriter(User $user){

        $user->is_writer = true;
        $user->save();
        
        return redirect()->route('admin.candidate-request');
    }



    // view of all staff 
    public function staff(){
        
        $users = User::all();
        return view('admin.staff', compact('users'));
    }

    // view of all articles
    public function allArticle(){
        
        $articles = Article::all();
        return view('admin.all-article', compact('articles'));
    }

    // view of all tags
    public function tags(){
        
        $tags = Tag::all();
        return view('admin.tag', compact('tags'));
    }

    // tags edit
    public function tags_edit(Request $request, Tag $tag){

        $tag->update([

            'name' => $request->name
        ]);

        return redirect()->route('admin.tag');
    }

    // tag delete
    public function tags_delete(Tag $tag){

        $tag->delete();

        return redirect()->route('admin.tag');
    }

    // view of all category
    public function categories(){

        $categories = Category::all();

        return view('admin.categories', compact('categories'));
    }

     // category edit
     public function category_edit(Request $request, Category $category){

        $category->update([

            'name' => $request->name
        ]);

        return redirect()->route('admin.categories');
    }

    // category delete
    public function category_delete(Category $category){

        $category->delete();

        return redirect()->route('admin.categories');
    }


}
