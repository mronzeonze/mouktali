<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminEditUserComponent extends Component
{
    public $name;
    public $email;
    public $password;
    public $cpassword;
    public $utype;
    public $user_id;

    public function mount($user_id)
    {
        $user = User::where('id',$user_id)->first();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->utype = $user->utype;
        $this->user_id = $user->id;
    } 

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required', 
            'password' => 'required',
            'cpassword' => 'required',
            'utype' => 'required',
        ]);
    }
    public function storeUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required', 
            'password' => 'required',
            'cpassword' => 'required|same:password',
            'utype' => 'required',
        ]);
        $user = User::find($this->user_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->utype = $this->utype;
        $user->save();
        session()->flash('message','L\'utilisateur a été modifié avec succé');   
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-user-component')->layout('layouts.base');
    }
}
