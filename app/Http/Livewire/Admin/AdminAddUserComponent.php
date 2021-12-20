<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AdminAddUserComponent extends Component
{
    public $name;
    public $email;
    public $password;
    public $cpassword;
    public $utype;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required|unique:users', 
            'password' => 'required',
            'cpassword' => 'required',
            'utype' => 'required',
        ]);
    }
    public function storeUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users', 
            'password' => 'required',
            'cpassword' => 'required|same:password',
            'utype' => 'required',
        ]);
        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->utype = $this->utype;
        $user->save();
        session()->flash('message','L\'utilisateur a été ajoutée avec succé');   
    }

    public function render()
    {
        return view('livewire.admin.admin-add-user-component')->layout('layouts.base');
    }
}
