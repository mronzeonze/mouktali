<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{

    public $title;
    public $slug;
    public $status;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
        $category = Category::where('slug',$category_slug)->first();
        $this->category_id = $category->id;
        $this->title = $category->title;
        $this->slug = $category->slug;
        $this->status = $category->status;
    } 

    public function generateslug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'slug' => 'required|unique:categories' 
        ]);
    }

    public function updateCategory()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required'
        ]);
        $category = Category::find($this->category_id);
        $category->title = $this->title;
        $category->slug = $this->slug;
        $category->status = $this->status;
        $category->save();
        session()->flash('message','La catégorie a été mise à jour avec succé');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.base');
    }
}
