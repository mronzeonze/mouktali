<?php

namespace App\Http\Livewire;

use App\Models\Pages;
use Livewire\Component;

class PageComponent extends Component
{
    public function render()
    {
        $pages = Pages::find(1);
        return view('livewire.page-component',['pages'=>$pages])->layout('layouts.base');
    }
}
