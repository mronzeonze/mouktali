<?php

namespace App\Http\Livewire\Admin;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class AdminHomeComponent extends Component
{
    use WithPagination;
     
    public function render()
    {
        $articles = Article::where('status',0)->paginate(3);
        $articlespublish = Article::where('status',1)->paginate(3);
        $articlesfeatured = Article::where('featured',1)->paginate(3);
        return view('livewire.admin.admin-home-component',
        ['articles' => $articles,
        'articlespublish' => $articlespublish,
        'articlesfeatured' => $articlesfeatured])->layout('layouts.base');
    }
}
