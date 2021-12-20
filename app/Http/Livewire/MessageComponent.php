<?php

namespace App\Http\Livewire;

use App\models\Message;
use Livewire\Component;

class MessageComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $texte;


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:8',
            'email' => 'required|email',
            'texte' => 'required'

        ]);
    }
    public function sendMessage()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:8',
            'email' => 'required|email',
            'texte' => 'required'
        ]);
        $message = new Message;
        $message->name = $this->name;
        $message->email = $this->email;
        $message->phone = $this->phone;
        $message->texte = $this->texte;
        $message->save();
        session()->flash('message','Votre message a été envoyé avec succé');
    }
    public function render()
    {
        return view('livewire.message-component')->layout('layouts.base');
    }
}
