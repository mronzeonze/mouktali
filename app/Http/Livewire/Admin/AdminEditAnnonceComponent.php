<?php

namespace App\Http\Livewire\Admin;

use App\Models\Annonces;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class AdminEditAnnonceComponent extends Component
{

    use WithFileUploads;
    public $title;
    public $url;
    public $location;
    public $status;
    public $image;
    public $annonce_id;

    public $newimage;

    public function mount($annonce_id)
    {
        $this->annonce_id = $annonce_id;
        $annonce = Annonces::where('id',$annonce_id)->first();
        $this->annonce_id = $annonce->id;
        $this->title = $annonce->title;
        $this->url = $annonce->url;
        $this->image = $annonce->image;
        $this->location = $annonce->location;
        $this->status = $annonce->status;
    } 

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'status' => 'required'
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes:jpeg,png',
            ]);
        }
    }

    public function editAnnonce()
    {
        $this->validate([
            'title' => 'required',
            'status' => 'required'
        ]);

        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:jpeg,png',
            ]);
        }
        $annonce = Annonces::find($this->annonce_id);
        $annonce->title = $this->title;
        $annonce->url = $this->url;
        $annonce->status = $this->status;
        $annonce->location = $this->location;
        if($this->newimage)
        {
            $destination_path = 'uploads/annonces'.'/'.$annonce->image;
            File::delete($destination_path);
            $imageName = Carbon::now()->timestamp;
            $this->newimage->storeAs('annonces',$imageName,'public_uploads');
            $annonce->image = $imageName;
        }

        $annonce->save();
        session()->flash('message','Annonce a été mise à jour avec succé!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-annonce-component')->layout('layouts.base');
    }
}
