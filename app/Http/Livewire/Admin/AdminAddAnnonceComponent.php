<?php

namespace App\Http\Livewire\Admin;

use App\Models\Annonces;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class AdminAddAnnonceComponent extends Component
{

    use WithFileUploads;
    public $title;
    public $url;
    public $location;
    public $status;
    public $image;


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png',
            'status' => 'required'
        ]);
    }

    public function addAnnonce()
    {
        $this->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png',
            'status' => 'required'
        ]);
        $annonce = new Annonces();
        $annonce->title = $this->title;
        $annonce->url = $this->url;
        $annonce->status = $this->status;
        $annonce->location = $this->location;
        $imageName = Carbon::now()->timestamp;
        $this->image->storeAs('annonces',$imageName,'public_uploads');
        $annonce->image = $imageName;

        $annonce->save();
        session()->flash('message','Annonce a été ajouté avec succé!');
    }


    public function render()
    {
        return view('livewire.admin.admin-add-annonce-component')->layout('layouts.base');
    }
}
