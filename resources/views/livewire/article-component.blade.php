	{{-- Script facebook --}}
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" 
		src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v10.0" 
		nonce="uuIykaNh">
	</script>
	{{-- fin --}}
    
    {{-- script twiter --}}
	<script>window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
    
        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };
    
        return t;
        }(document, "script", "twitter-wjs"));</script>
        {{-- fin --}}
    

<div class="wrapper">

    <div class="row" style="margin-top:30px;">
        <div class="col-md-8">
            <div class="col-md-12" style="padding:15px 15px 30px 0px;">				
                <div class="col-md-12">
                    {{-- nombre de vue --}}
						<div class="text-right view-count">
							<h3>
								<i class="fa fa-eye"></i>
								{{$article->views + 1 }}
								@if($article->views != 0)
								Vues
								@else
								Vue
								@endif
							</h3>
						</div>
                    <h1 class="articleTitle">{{ $article->title }}</h1>
                    <img src="{{asset('storage/assets/images/articles') }}/{{$article->image}}" width="100%" style="margin-bottom:15px;" />
                    <p align="justify">{{ $article->description }}</p><br>
                </div>	
                {{-- btn partager --}}
                <div class="col-sm-12 share-this">
                    <h3>Partager ça...</h3>
                    <div class="col-md-12">
                        {{-- btn facebook --}}
                        <div class="fb-share-button" 
                            data-href="{{route('article.show',['article_slug'=> $article->slug])}}" 
                            data-layout="button" data-size="small">
                            {{-- <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('article')}}/{{$data->slug}}" 
                            class="fb-xfbml-parse-ignore">Partager</a>  --}}
                        </div>
                        {{-- btn twiter --}}
                        <span class="twiter-btn">
                        <a class="twitter-share-button"
                            href="https://twitter.com/intent/tweet"
                            data-size="small">Tweet</a>
                        </span>
                        {{-- btn linkedin --}}
                        <span>
                            <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: fr_FR</script>
                            <script type="IN/Share" data-url="{{route('article.show',['article_slug'=> $article->slug])}}"></script>
                        </span>	
                    </div>	
                </div>
                {{-- fin btn partage --}}

                <div class="row">	
                    <div class="col-md-12">
                        <h3>Articles Similaires</h3>
                    </div>
                    @foreach($related->take(6) as $key => $rel)
                        <div class="col-md-4">
                            <a href="{{route('article.show',['article_slug'=> $rel->slug])}}">
                            <img src="{{asset('storage/assets/images/articles') }}/{{$rel->image}}" width="300" height="200" style="margin-bottom:15px;" /></a>
                            <h3 class="articleTitle">{{ substr($rel->title,0,50) }}</h3>
                            <p align="justify">{!! substr($rel->description,0,100) !!} <a href="{{route('article.show',['article_slug'=> $rel->slug])}}">Voir plus ...</a></p><br>
                        </div>   
                    @endforeach			
                </div>
                
                {{-- commentaire --}}
                <div class="row">
                    <h3 style="border-bottom:3px solid #1abc9c; padding-bottom:5px;">
						<span style="padding:6px 12px; background:#1abc9c;">Commentaires</span>
					</h3>
                    @if(count($comments) > 0)
                        <strong>({{count($comments)}}) Commentaires </strong>  
                        @foreach($comments as $key => $comment)
                        <div class="col-md-12" style="border-bottom:1px solid #ccc; padding:10px;">
                            <div class="col-md-2">
                                <img src="{{asset('storage/assets/images/comments/comment.png') }}" style="width:70px; border-radius:50%;" alt=""><br>
                                {{-- formatting date --}}
                                @php
                                    setlocale(LC_TIME, 'French');
                                    $dateformat = $comment->created_at->formatLocalized('%d %B %Y');
                                @endphp
                                <span>{{$comment->created_at}}</span>
                            </div>
                            <div class="col-md-10">
                                <strong>{{$comment->name}}</strong> <br>
                                <span >{!!$comment->texte!!}</span>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="col-md-12" style="border-bottom:1px solid #ccc; padding:10px;">
                            <span>Aucun commentaire pour cet article</span>
                        </div>
                    @endif
                </div>
                
                <div class="row">
                   @livewire('comment-component',['article' =>$article])
                </div>
            </div>        
        </div>

        <!-- right section -->
        {{-- advertissement right --}}
		@livewire('advertissement')

    </div> 
</div>