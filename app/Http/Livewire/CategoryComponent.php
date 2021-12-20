<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $cat;


    public function mount($category_slug)
    {
        $this->cat = Category::where('slug',$category_slug)->first();
    }

    public function render()
    {
        $articles = Article::where('category_id',$this->cat->id)->get();
        return view('livewire.category-component',
        ['articles'=>$articles])->layout('layouts.base');
    }
}
