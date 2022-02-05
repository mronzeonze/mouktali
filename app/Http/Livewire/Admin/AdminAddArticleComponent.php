<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Article;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddArticleComponent extends Component
{

    use WithFileUploads;
    public $title;
    public $slug;
    public $description;
    public $status;
    public $image;
    public $category_id;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'slug' => 'required|unique:articles',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png',
            'category_id' => 'required',
            'status' => 'required'
        ]);
    }

    public function addArticle()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:articles',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png',
            'category_id' => 'required',
            'status' => 'required',
        ]);
        $article = new Article();
        $article->title = $this->title;
        $article->slug = $this->slug;
        $article->description = $this->description;
        $article->status = $this->status;
        $article->category_id = $this->category_id;
        $imageName = Carbon::now()->timestamp;
        $this->image->storeAs('articles',$imageName,'public_uploads');
        $article->image = $imageName;

        $article->save();
        session()->flash('message','Article a été ajouté avec succé!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-article-component',
        ['categories' => $categories])->layout('layouts.base');
    }
}
