<?php

namespace App\Http\Livewire;

use App\Models\Annonces;
use App\Models\Article;
use App\Models\Setting;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $article = Article::orderBy('created_at','DESC')->first();
        $setting = Setting::orderBy('id','DESC')->first();
        $annonce = Annonces::orderBy('id','DESC')->first();
        $bannieres = Annonces::where('status',1)->where('location','banniere')->orderBy('created_at','DESC')->get();
        return view('livewire.header',['article'=>$article, 'setting'=>$setting,'annonce'=>$annonce, 'bannieres'=>$bannieres]);
    }
}
