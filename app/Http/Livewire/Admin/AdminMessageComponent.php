<?php

namespace App\Http\Livewire\Admin;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMessageComponent extends Component
{
    use WithPagination;

    public function deleteMessage($id)
    {
        $message = Message::find($id);
        $message->delete();
        session()->flash('message','Le Message a été supprimée avec succé');
    }

    public function render()
    {
        $messages = Message::paginate(10);
        return view('livewire.admin.admin-message-component',
        ['messages' => $messages])->layout('layouts.base');
    }
}
