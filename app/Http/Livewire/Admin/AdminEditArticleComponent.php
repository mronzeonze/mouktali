<?php

namespace App\Http\Livewire\Admin;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class AdminEditArticleComponent extends Component
{
    use WithFileUploads;
    
    public $title;
    public $slug;
    public $description;
    public $status;
    public $image;
    public $category_id;
    public $category_slug;

    public $newimage;

    public function mount($article_slug)
    {
        $article = Article::where('slug',$article_slug)->first();
        $this->title = $article->title;
        $this->slug = $article->slug;
        $this->description = $article->description;;
        $this->image = $article->image;
        $this->category_id = $article->category_id;
        $this->article_id = $article->id;
        $this->status = $article->status;
      
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ]);

        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes:jpeg,png',
            ]);
        }
    }

    public function updateArticle()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:jpeg,png',
            ]);
        }
        $article = Article::find($this->article_id);
        $article->title = $this->title;
        $article->slug = $this->slug;
        $article->description = $this->description;
        $article->status = $this->status;
        if($this->status == 0)
        {
            $article->featured = 0; 
        }
        $article->category_id = $this->category_id;
        if($this->newimage)
        {
            $destination_path = 'uploads/articles'.'/'.$article->image;
            File::delete($destination_path);
            $imageName = Carbon::now()->timestamp;
            $this->newimage->storeAs('articles',$imageName,'public_uploads');
            $article->image = $imageName;
        }

        $article->save();

        session()->flash('message','Article a été modifié avec succé!');
    }

    public function render()
    {
        $categories = Category::All();
        return view('livewire.admin.admin-edit-article-component',
        ['categories' => $categories])->layout('layouts.base');
    }
}
