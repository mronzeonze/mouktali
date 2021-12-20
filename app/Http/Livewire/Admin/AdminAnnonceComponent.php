<?php

namespace App\Http\Livewire\Admin;

use App\Models\Annonces;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAnnonceComponent extends Component
{
    use WithPagination;

    //search article
    public $searchTerm;

    public $annonce;

    public function deleteAnnonce($id)
    {
        $article = Annonces::find($id);
        if($annonce->image)
        {
            unlink('storage/assets/images/annonces'.'/'.$annonce->image);
        }
        $annonce->delete();
        session()->flash('message','annonce a été supprimée avec succé');
    }
    
    public function annonce($id){
        $annonce = Annonces::find($id); 
        if($annonce->featured){
            $annonce->status = 0;
            $annonce->save();
            session()->flash('message', 'annonce est maintenant n\'est plus publier');
        }
        else{
            $annonce->status = 1;
            $annonce->save();
            session()->flash('message', 'annonce est maintenant publier');
        }
     }

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $annonces = Annonces::where('title','LIKE',$search)
                    ->orWhere('url','LIKE',$search)
                    ->orWhere('location','LIKE',$search)
                    ->orderBy('id','DESC')->paginate(10);
        $publish = Annonces::where('status', 1)->count();
        $allannonces = Annonces::count();
        return view('livewire.admin.admin-annonce-component',
        ['annonces'=>$annonces,
        'publish'=>$publish,
        'allannonces'=>$allannonces])->layout('layouts.base');
    }
}
