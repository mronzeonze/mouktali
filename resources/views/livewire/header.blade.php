<div class="col-md-12 top" id="top">
	<div class="col-md-9 top-left">
    	<div class="col-md-3">
    		<span class="day">{{Carbon\Carbon::now()->isoFormat('LLLL')}}</span> 
        </div>
        <div class="col-md-9">
			@if ($article)
        	<span class="latest">Dernierement: </span> <a href="{{route('article.show',['article_slug'=> $article->slug])}}">{{substr($article->title,0,100)}}</a>
			@endif
		</div>
    </div>
    <div class="col-md-3">
		@if($setting)
			<a href="{{$setting->facebook}}"><img src="{{asset('assets/images/icon-fb.png') }}" /></a>
			<a href="{{$setting->twiter}}"><img src="{{asset('assets/images/icon-twitter.png') }}" /></a>
			<a href="#"><img src="{{asset('assets/images/icon-google.png') }}" /></a>
			<a href="{{$setting->instagram}}"><img src="{{asset('assets/images/icon-insta.png') }}" /></a>	
		@endif
    </div>
</div>

<div class="col-md-12 brand">
	<div class="col-md-4 name">
		{{-- <table>
			<tr>
				<td><a href="{{ route('home')}}"><font color="#1abc9c">LEM</font></a></td><td bgcolor="#1abc9c"><a href="{{ route('home')}}"><font color="#fff">OUKTALI</font></a></td>
			</tr>
		</table> --}}
		
		{{-- logo site --}}
		<img src="{{asset('storage/assets/images/logos/logomouktali1.png')}}" height="70"/>
    </div>
    <div class="col-md-8">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1"></li>
			  <li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
		  
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				@if($bannieres)
				@foreach($bannieres as $key => $banniere)
					<div class="item {{($key==1) ?'active':''}}" style="height: 100px !important">
						<a href="$banniere->url">
						<img src="{{asset('storage/assets/images/annonces')}}/{{$banniere->image}}">
					</div>	
				@endforeach
				@endif
		  
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
			</div>
		</div>
	</div>
</div>
