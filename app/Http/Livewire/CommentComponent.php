<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use App\Http\Controllers\Redirect;

class CommentComponent extends Component
{
    public $name;
    public $email;
    public $texte;
    public $article_id;
    public $article_slug;

    public function mount($article)
    {
        $this->article_id = $article->id;
        $this->article_slug = $article->slug;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required',
            'texte' => 'required',

        ]);
    }

    public function sendComment()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'texte' => 'required',
        ]);
        
        $comment = new Comment();
        $comment->name = $this->name;
        $comment->email = $this->email;
        $comment->texte = $this->texte;
        $comment->article_id = $this->article_id;
        $comment->save();
        $this->name = "";
        $this->email = "";
        $this->texte = "";
        session()->flash('message','Merci pour votre commentaire!');
        return redirect()->route('article.show',['article_slug'=> $this->article_slug]);
    }
    
    public function render()
    {
        return view('livewire.comment-component');
    }
}
