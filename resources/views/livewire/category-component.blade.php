<div class="wrapper">
    <div class="row" style="margin-top:30px;">
        <div class="col-md-8">
            <div class="col-md-12" style="padding:15px 15px 30px 0px;">
                @foreach($articles as $key => $article)
                    @if($key==0)
                    <div class="col-md-12">
                        <h3 style="border-bottom:3px solid #1abc9c; padding-bottom:5px;"><span style="padding:6px 12px; background:#1abc9c;">{{$article->category->title}}</span></h3>
                    </div>
                    <div class="col-md-12">
                        <a href="{{route('article.show',['article_slug'=> $article->slug])}}">
                            <img src="{{asset('storage/assets/images/articles') }}/{{$article->image}}" width="100%" style="margin-bottom:15px;" />
                        </a>
                        <h3 class="articleTitle">{{ $article->title }}</h3>
                        <p align="justify">{{substr($article->description,0,300)}} <a href="{{route('article.show',['article_slug'=> $article->slug])}}">Voir plus ...</a></p><br>
                    </div>
                    @endif
                @endforeach
                <div class="row">
                    @foreach($articles->take(11) as $key => $article)
                    @if($key > 0)
                        <div class="col-md-6">
                            <a href="{{route('article.show',['article_slug'=> $article->slug])}}">
                                <img src="{{asset('storage/assets/images/articles') }}/{{$article->image}}" width="450" height="300" style="margin-bottom:15px;" />
                            </a>
                            <h3 class="articleTitle">{{ substr($article->title,0,50) }}</h3>
                            <p align="justify">{{substr($article->description,0,200)}} <a href="{{route('article.show',['article_slug'=> $article->slug])}}">Voir plus ...</a></p>
                        </div>
                    @endif
                    @endforeach
                </div>            
            </div>        
        </div>

        <!-- right section -->
        {{-- advertissement right --}}
		<livewire:advertissement />
    </div> 
</div>