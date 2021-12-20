<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pages;
use Livewire\Component;

class AdminPageComponent extends Component
{
    public $description;

    public function mount()
    {
        $pages = Pages::find(1);
        if ($pages)
        {
            $this->description = $pages->description;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'description' => 'required',
        ]);
    }

    public function savePages()
    {
        $this->validate([
            'description' => 'required'

        ]);

        $pages = Pages::find(1);
        if($pages)
        {
            $pages->description = $this->description;
            $pages->save();
            session()->flash('message','A propos ont été sauvegardé avec succés');
        }else{
            $pages = new Pages();
            $pages->description = $this->description;
            $pages->save();
            session()->flash('message','A propos ont été sauvegardé avec succés');
        }
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.admin.admin-page-component')->layout('layouts.base');
    }
}
