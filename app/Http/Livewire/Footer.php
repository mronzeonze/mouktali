<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Setting;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $setting = Setting::orderBy('id','DESC')->first();
        $categories = Category::inRandomOrder()->limit(4)->get();
        return view('livewire.footer',['setting'=>$setting, 'categories'=>$categories]);
    }
}
