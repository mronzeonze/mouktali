<?php

namespace App\Http\Livewire\Admin;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;

class AdminArticleComponent extends Component
{
    use WithPagination;

    //search article
    public $searchTerm;

    public $featured;

    public function deleteArticle($id)
    {
        $article = Article::find($id);
        if($article->image)
        {
            $destination_path = 'uploads/articles'.'/'.$article->image;
            File::delete($destination_path);
        }
        $article->delete();
        session()->flash('message','Article a été supprimée avec succé');
    }
    
    public function featured($id){
        $article = Article::find($id); 
        if($article->featured){
            $article->featured = 0;
            $article->save();
            session()->flash('message', 'Article est maintenant n\'est plus en vedette');
        }
        else{
            $article->featured = 1;
            $article->save();
            session()->flash('message', 'Article est maintenant en vedette');
        }
    }

    public function render()
    {
        $search = '%' . $this->searchTerm . '%';
        $articles = Article::where('title','LIKE',$search)
                    ->orWhere('description','LIKE',$search)
                    ->orderBy('id','DESC')->paginate(5);
        $publish = Article::where('status', 1)->count();
        $allarticles = Article::count();
        return view('livewire.admin.admin-article-component',
        ['articles'=>$articles,
        'publish'=>$publish,
        'allarticles'=>$allarticles])->layout('layouts.base');
    }
}
