<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;


class AdminUserComponent extends Component
{

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('message','L\'utilisateur a été supprimée avec succé');
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.admin.admin-user-component',['users'=>$users])->layout('layouts.base');
    }
}
