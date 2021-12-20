<?php

namespace App\Http\Livewire;

use App\Models\Annonces;
use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        $featured = Article::where('featured',1)->where('status', 1)->orderBy('created_at','DESC')->get();
        $cat1arts = Article::where('category_id',1)->where('status', 1)->orderBy('created_at','DESC')->get();
        $cat2arts = Article::where('category_id',2)->where('status', 1)->orderBy('created_at','DESC')->get();
        $cat3arts = Article::where('category_id',3)->where('status', 1)->orderBy('created_at','DESC')->get();
        $cat4arts = Article::where('category_id',4)->where('status', 1)->orderBy('created_at','DESC')->get();
        $cat5arts = Article::where('category_id',5)->where('status', 1)->orderBy('created_at','DESC')->get();
        $cat6arts = Article::where('category_id',6)->where('status', 1)->orderBy('created_at','DESC')->get();
        return view('livewire.home-component',
        ['featured' => $featured,'cat1arts' => $cat1arts,
        'cat2arts' => $cat2arts,'cat3arts' => $cat3arts,
        'cat4arts' => $cat4arts,'cat5arts' => $cat5arts,
        'cat6arts' => $cat6arts,'categories' => $categories])->layout('layouts.base');
    }
}
