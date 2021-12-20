<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','La catégorie a été supprimée avec succé');
    }

    public function status($id){
        $category = Category::find($id); 
        if($category->status){
            $category->status = 0;
            $category->save();
            session()->flash('message', 'Categories est maintenant n\'est plus publier');
        }
        else{
            $category->status = 1;
            $category->save();
            session()->flash('message', 'Categories est maintenant publier');
        }
    }
    
    public function render()
    {
        $categories = Category::paginate(10);
        return view('livewire.admin.admin-category-component',
        ['categories'=> $categories])->layout('layouts.base');
    }
}
