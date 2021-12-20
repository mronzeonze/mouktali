<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Article;
use Livewire\Component;

class ArticleComponent extends Component
{
    public $article_slug;
    
    public function mount($article_slug)
    {
        $this->article_slug = $article_slug;
        
    }

    
    

    public function render()
    {
        $article = Article::where('slug',$this->article_slug)->first();
        
        //views
        $views = $article->views;
        Article::where('slug',$this->article_slug)->update(['views'=>$views + 1]);

        //comments
        $comment_id = $article->id;
        $comments = Comment::where('article_id',$comment_id)->orderBy('created_at','DESC')->get();

        $category_id = $article->category_id;
        $related = Article::where('status',1)
                    ->Where('featured',0)
                    ->Where('category_id',$category_id)
                    ->Where('slug','!=',$this->article_slug)
                    ->orderBy('created_at','DESC')->get();
        return view('livewire.article-component',
        ['article' => $article, 'related' => $related, 'comments' => $comments ])->layout('layouts.base');
    }
}
