<div class="wrapper">
	@if(count($featured) > 0)
		<div class="row">
			@foreach($featured as $key=>$feat)
			@if($key == 0)
				<div class="col-md-6">
					<div class="relative">
						<a href="{{ route('article.show',['article_slug'=> $feat->slug])}}">
							<img src="{{asset('storage/assets/images/articles')}}/{{$feat->image}}" width="700" height="500"/>
						<span class="caption">{{$feat->title}}</span>
						</a>
					</div>
				</div>
			@endif
			@endforeach
			<div class="col-md-6">
				<div class="row">
					@foreach($featured as $key=>$feat)
					@if($key > 0 && $key < 3)
					<div class="col-md-6">
						<div class="relative">
							<a href="{{ route('article.show',['article_slug'=> $feat->slug])}}">
								<img src="{{asset('storage/assets/images/articles')}}/{{$feat->image}}" width="338" height="235" />
								<span class="caption">{{$feat->title}}</span>
							</a>
						</div>
					</div>
					@endif
					@endforeach
				</div>
				<div class="row" style="margin-top:30px;">
					@foreach($featured as $key=>$feat)
					@if($key >= 3 && $key < 5)
					<div class="col-md-6">
						<div class="relative">
							<a href="{{ route('article.show',['article_slug'=> $feat->slug])}}">
								<img src="{{asset('storage/assets/images/articles')}}/{{$feat->image}}"  width="338" height="235" />
								<span class="caption">{{$feat->title}}</span>
							</a>
						</div>
					</div>
					@endif
					@endforeach
				</div>        
			</div>
		</div>
    @endif
	{{-- fin vedette --}}

	{{-- ============== --}}
    <div class="row" style="margin-top:30px;">
    	<div class="col-md-8">
			{{-- Politique --}}
			<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px;">
				@foreach($cat1arts as $key =>$art)
				@if($key == 0)
				<div class="col-md-12">
					<h3 style="border-bottom:3px solid #1abc9c; padding-bottom:5px;">
						<span style="padding:6px 12px; background:#1abc9c;">{{$art->category->title}}</span>
					</h3>
				</div>
				@endif
				<div class="col-md-6">
					@if($key == 0)
						<a href="{{route('article.show',['article_slug'=> $art->slug])}}">
						<img src="{{asset('storage/assets/images/articles')}}/{{$art->image}}" width="100%" style="margin-bottom:15px;" /></a>
						<p align="justify">{!! substr($art->description,0,300) !!}</p>
						<a href="{{route('article.show',['article_slug'=> $art->slug])}}">Voir plus...</a>
					@endif
				</div>
				@endforeach
				<div class="col-md-6">
					@foreach($cat1arts as $key =>$art)
					@if($key >= 1 && $key < 5)
						<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
							<div class="col-md-4">
								<div class="row">
									<a href="{{route('article.show',['article_slug'=> $art->slug])}}">
									<img src="{{asset('storage/assets/images/articles')}}/{{$art->image}}" width="100%" /></a>
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<h4><a href="{{route('article.show',['article_slug'=> $art->slug])}}">{{$art->title}}</a></h4>
								</div>
							</div>
						</div> 
					@endif
					@endforeach  
				</div>
			</div>
			{{-- fin politique --}}

			{{-- Societe --}}
			<div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px; margin-bottom:30px;">
				@foreach($cat2arts->take(5) as $key => $art)
					@if($key == 0)
						<h3 style="border-bottom:3px solid #1abc9c; padding-bottom:5px;"><span style="padding:6px 12px; background:#1abc9c;">{{$art->category->title}}</span></h3>
					@endif
					<a href="{{route('article.show',['article_slug'=> $art->slug])}}">
					<img src="{{asset('storage/assets/images/articles')}}/{{$art->image}}"  width="100%" /></a>	
				@endforeach
			</div>
			{{-- fin societe --}}
			
			<div class="row">
				<div class="col-md-6">
					<div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
						<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
							@foreach($cat3arts as $key => $art)
							@if($key == 0)
								<h3 style="border-bottom:3px solid #1abc9c; padding-bottom:5px;"><span style="padding:6px 12px; background:#1abc9c;">{{$art->category->title}}</span></h3>
								<a href="{{route('article.show',['article_slug'=> $art->slug])}}">
								<img src="{{asset('storage/assets/images/articles')}}/{{$art->image}}"  width="100%" height="230" style="margin-bottom:15px;"/></a>
								<p align="justify">{!!substr($art->title,0,300)!!} <a href="{{route('article.show',['article_slug'=> $art->slug])}}">Voir plus ...</a></p>	
							@endif
							@endforeach
						</div>
						{{-- fin --}}

						{{-- debut --}}
						@foreach($cat3arts as $key => $art)
						@if($key >0 && $key < 5)
						<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
							<div class="col-md-4">
								<div class="row fashion">
									<a href="{{route('article.show',['article_slug'=> $art->slug])}}">
										<img src="{{asset('storage/assets/images/articles')}}/{{$art->image}}" width="100%" />
									</a>
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<h4><a href="{{route('article.show',['article_slug'=> $art->slug])}}">{{$art->title}}</a> </h4>
								</div>
							</div>
						</div>
						@endif
						@endforeach
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
						<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
							@foreach($cat4arts as $key => $art)
							@if($key == 0)
							<h3 style="border-bottom:3px solid #1abc9c; padding-bottom:5px;"><span style="padding:6px 12px; background:#1abc9c;">{{$art->category->title}}</span></h3>
								<a href="{{route('article.show',['article_slug'=> $art->slug])}}">
								<img src="{{asset('storage/assets/images/articles')}}/{{$art->image}}"  width="100%" height="230" style="margin-bottom:15px;"/></a>
								<p align="justify">{!!substr($art->title,0,300)!!} <a href="{{route('article.show',['article_slug'=> $art->slug])}}">Voir plus ...</a></p>
							@endif
							@endforeach
						</div>
						@foreach($cat4arts as $key => $art)
						@if($key >0 && $key < 5)
						<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
							<div class="col-md-4">
								<div class="row fashion">
									<a href="{{route('article.show',['article_slug'=> $art->slug])}}">
										<img src="{{asset('storage/assets/images/articles')}}/{{$art->image}}"  width="100%" />
									</a>
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<h4><a href="{{route('article.show',['article_slug'=> $art->slug])}}">{{$art->title}}</a> </h4>
								</div>
							</div>
						</div>
						@endif
						@endforeach
						
					</div>
				</div>
			
				<div class="col-md-12">
					<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top:30px;">
						@foreach($cat5arts as $key =>$art)
						@if($key == 0)
						<div class="col-md-12">
							<h3 style="border-bottom:3px solid #1abc9c; padding-bottom:5px;">
								<span style="padding:6px 12px; background:#1abc9c;">{{$art->category->title}}</span>
							</h3>
						</div>
						@endif
						<div class="col-md-6">
							@if($key == 0)
								<a href="{{route('article.show',['article_slug'=> $art->slug])}}">
								<img src="{{asset('storage/assets/images/articles')}}/{{$art->image}}" width="100%" style="margin-bottom:15px;" /></a>
								<p align="justify">{{substr($art->description,0,300)}}</p>
								<a href="{{route('article.show',['article_slug'=> $art->slug])}}">Voir plus...</a>
							@endif
						</div>
						@endforeach
						<div class="col-md-6">
							@foreach($cat5arts as $key =>$art)
							@if($key >= 1 && $key < 5)
								<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
									<div class="col-md-4">
										<div class="row">
											<a href="{{route('article.show',['article_slug'=> $art->slug])}}">
											<img src="{{asset('storage/assets/images/articles')}}/{{$art->image}}" width="100%" /></a>
										</div>
									</div>
									<div class="col-md-8">
										<div class="row">
											<h4><a href="{{route('article.show',['article_slug'=> $art->slug])}}">{{$art->title}}</a></h4>
										</div>
									</div>
								</div> 
							@endif
							@endforeach  
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top:30px;">
						@foreach($cat6arts as $key =>$art)
						@if($key == 0)
						<div class="col-md-12">
							<h3 style="border-bottom:3px solid #1abc9c; padding-bottom:5px;">
								<span style="padding:6px 12px; background:#1abc9c;">{{$art->category->title}}</span>
							</h3>
						</div>
						@endif
						<div class="col-md-6">
							@if($key == 0)
								<a href="{{route('article.show',['article_slug'=> $art->slug])}}">
								<img src="{{asset('storage/assets/images/articles')}}/{{$art->image}}" width="100%" style="margin-bottom:15px;" /></a>
								<p align="justify">{!!substr($art->description,0,300)!!}</p>
								<a href="{{route('article.show',['article_slug'=> $art->slug])}}">Voir plus...</a>
							@endif
						</div>
						@endforeach
						<div class="col-md-6">
							@foreach($cat6arts as $key =>$art)
							@if($key >= 1 && $key < 5)
								<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
									<div class="col-md-4">
										<div class="row">
											<a href="{{route('article.show',['article_slug'=> $art->slug])}}">
											<img src="{{asset('storage/assets/images/articles')}}/{{$art->image}}" width="100%" /></a>
										</div>
									</div>
									<div class="col-md-8">
										<div class="row">
											<h4><a href="{{route('article.show',['article_slug'=> $art->slug])}}">{{$art->title}}</a></h4>
										</div>
									</div>
								</div> 
							@endif
							@endforeach  
						</div>
					</div>
				</div>
			</div>
		
			{{-- end col-md-8 --}}
        </div>

		<!-- right section -->
		{{-- advertissement right --}}

		<livewire:advertissement />
    </div> 
</div>