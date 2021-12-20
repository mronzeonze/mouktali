<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Annonces;
use Livewire\Component;

class Advertissement extends Component
{
    public function render()
    {
        $annonces = Annonces::where('status',1)->orderBy('created_at','DESC')->get();
        $annonceright = Annonces::where('status',1)->where('location','right')->orderBy('created_at','DESC')->first();
        $annoncerightseul = Annonces::where('status',1)->where('location','rightseul')->orderBy('created_at','DESC')->first();
        $cat7arts = Article::where('category_id',7)->orderBy('created_at','DESC')->get();
        $republiques = Article::where('category_id',6)->orderBy('created_at','DESC')->get();
        return view('livewire.advertissement',['cat7arts' => $cat7arts,'annonces' => $annonces,
        'annonceright' => $annonceright,'annoncerightseul' => $annoncerightseul, 'republiques' => $republiques]);
    }
}
