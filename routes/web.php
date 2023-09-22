<?php

use App\Models\LastestArticle;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\LastestArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Homepage
Route::get('/', [HomepageController::class, 'index'])->name('homepage');

// Route item order selector
Route::get('/homepage/latest-article', [HomepageController::class, 'latest'])->name('article.latest');
Route::get('/homepage/oldest-article', [HomepageController::class, 'oldest'])->name('article.oldest');


// Route Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::get('/profile', [ProfileController::class, 'articles'])->middleware('auth')->name('profile');

// Route edit users information
Route::get('/profile/edit-information', [ProfileEditController::class, 'index'])->name('edit.info');

// Route Add Post
Route::get('/add-post', [ArticleController::class, 'create'])->middleware('auth')->name('addPost.create');
Route::post('/add-post', [ArticleController::class, 'store'])->middleware('auth')->name('addPost.store');

// Route edit/update/delete Post
Route::get('/profile/edit-post/{id}', [ArticleController::class, 'edit'])->name('post.edit');
Route::put('/profile/edit-post/{id}', [ArticleController::class, 'update'])->name('post.update');
Route::delete('/profile/delete-post/{id}', [ArticleController::class, 'destroy'])->name('post.delete');

// Route Categories Selector
Route::get('/homepage/article-category/{id}', [CategorieController::class, 'index'])->name('article.category');

// Route Article details
Route::get('/homepage/post-details/{id}', [LastestArticleController::class, 'index'])->name('article.details');