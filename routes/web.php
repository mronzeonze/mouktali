<?php

//admin
use App\Http\Livewire\Admin\AdminMessageComponent;
use App\Http\Livewire\Admin\AdminEditAnnonceComponent;
use App\Http\Livewire\Admin\AdminAddAnnonceComponent;
use App\Http\Livewire\Admin\AdminAnnonceComponent;
use App\Http\Livewire\Admin\AdminEditArticleComponent;
use App\Http\Livewire\Admin\AdminAddArticleComponent;
use App\Http\Livewire\Admin\AdminArticleComponent;
use App\Http\Livewire\Admin\AdminAddSettingComponent;
use App\Http\Livewire\Admin\AdminSettingComponent;
use App\Http\Livewire\Admin\AdminPageComponent;
use App\Http\Livewire\Admin\AdminHomeComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminUserComponent;
use App\Http\Livewire\Admin\AdminAddUserComponent;
use App\Http\Livewire\Admin\AdminEditUserComponent;

use App\Http\Controllers\MenuController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\MessageComponent;
use App\Http\Livewire\CommentComponent;
use App\Http\Livewire\PageComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ArticleComponent;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class)->name('home');
Route::get('/categorie/{category_slug}',CategoryComponent::class)->name('categorie.show');
Route::get('/article/{article_slug}',ArticleComponent::class)->name('article.show');
Route::get('/message',MessageComponent::class)->name('message');
Route::get('/apropos',PageComponent::class)->name('apropos');

//Admin
Route::get('/admin-mouktali', function () { return view('auth.login'); });

// Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//     return view('home');
// });

Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {
    Route::get('/admin/home',AdminHomeComponent::class)->name('admin.home');
    Route::get('/admin/messages',AdminMessageComponent::class)->name('admin.messages');
    Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/categorie/add',AdminAddCategoryComponent::class)->name('admin.addcategorie');
    Route::get('/admin/categorie/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.editcategorie');

    //Article
    Route::get('/admin/articles',AdminArticleComponent::class)->name('admin.articles');
    Route::get('/admin/article/add',AdminAddArticleComponent::class)->name('admin.addarticle');
    Route::get('/admin/article/edit/{article_slug}',AdminEditArticleComponent::class)->name('admin.editarticle');
    //Setting
    Route::get('/admin/settings',AdminSettingComponent::class)->name('admin.settings');
    //Pages
    Route::get('/admin/pages',AdminPageComponent::class)->name('admin.pages');

    //annonces
    Route::get('/admin/annonces',AdminAnnonceComponent::class)->name('admin.annonces');
    Route::get('/admin/annonce/add',AdminAddAnnonceComponent::class)->name('admin.addannonce');
    Route::get('/admin/annonce/edit/{annonce_id}',AdminEditAnnonceComponent::class)->name('admin.editannonce');

    //users
    Route::get('/admin/users',AdminUserComponent::class)->name('admin.users');
    Route::get('/admin/user/add',AdminAddUserComponent::class)->name('admin.adduser');
    Route::get('/admin/user/edit/{user_id}',AdminEditUserComponent::class)->name('admin.edituser');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    
});
