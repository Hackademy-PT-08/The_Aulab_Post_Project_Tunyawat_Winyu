<?php

use App\Models\LastestArticle;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\LastestArticleController;
use App\Http\Controllers\ApplicationFormController;
use App\Livewire\ArticleSearch;

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
Route::get('/', [HomepageController::class, 'homeArticles'])->name('homepage');

// Route item order selector
Route::get('/homepage/latest-article', [FrontendController::class, 'latest'])->name('article.latest');
Route::get('/homepage/oldest-article', [FrontendController::class, 'oldest'])->name('article.oldest');


// Route Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::get('/profile', [ProfileController::class, 'articles'])->middleware('auth')->name('profile');

// Route edit users information
Route::get('/profile/edit-information', [ProfileController::class, 'editInfoUser'])->name('edit.info');

// Route edit/update/delete Post
Route::get('/profile/edit-post/{id}', [ArticleController::class, 'edit'])->name('post.edit');
Route::put('/profile/edit-post/{id}', [ArticleController::class, 'update'])->name('post.update');
Route::delete('/profile/delete-post/{id}', [ArticleController::class, 'destroy'])->name('post.delete');

// Route Categories Selector
Route::get('/homepage/article-category/{category}', [CategoryController::class, 'articles_by_category'])->name('article.category');

// Route Article details
Route::get('/homepage/post-details/{id}', [FrontendController::class, 'details_article'])->name('article.details');

// Route Work With Us
Route::get('/homepage/work-with-us', [FrontendController::class, 'workWithUs'])->middleware('auth')->name('workWithUs');
Route::post('/homepage/work-with-us/store', [ApplicationFormController::class, 'rolesRequest'])->name('workWithUs.store');

// Route only for Admin
Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/{user}/set-admin', [AdminController::class, 'makeUserAdmin'])->name('makeUserAdmin');
    Route::get('/admin/{user}/set-revisor', [AdminController::class, 'makeUserRevisor'])->name('makeUserRevisor');
    Route::get('/admin/{user}/set-writer', [AdminController::class, 'makeUserWriter'])->name('makeUserWriter');
});

// Route only for Writer
Route::middleware('writer')->group(function(){
    // Route Add Post
    Route::get('/add-post', [ArticleController::class, 'create'])->middleware('auth')->name('addPost.create');
    Route::post('/add-post', [ArticleController::class, 'store'])->middleware('auth')->name('addPost.store');
});

// Route only for Revisor
Route::middleware('revisor')->group(function(){
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::get('/revisor/article/{article}/detail', [RevisorController::class, 'articleDetail'])->name('revisor.articleDetail');
    Route::get('/revisor/article/{article}/accept', [RevisorController::class, 'articleAccept'])->name('revisor.articleAccept');
    Route::get('/revisor/article/{article}/reject', [RevisorController::class, 'articleReject'])->name('revisor.articleReject');
});

// Route searchBar
Route::get('/article/search', [HomepageController::class, 'searchArticle'])->name('article.search');