<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminAddCategoryComponent extends Component
{
    public $title;
    public $slug;
    public $status;


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
    public function storeCategory()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories'
        ]);
        $category = new Category;
        $category->title = $this->title;
        $category->slug = $this->slug;
        $category->status = $this->status;
        $category->save();
        session()->flash('message','La catégorie a été ajoutée avec succé');   
    }
    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
