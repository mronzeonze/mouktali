
		{{-- produit divers --}}
        <div class="col-md-4">
			{{-- boutiques --}}
			<div class="col-md-12" style="border:1px solid #ccc; padding:15px;">
				@if($cat7arts)
				@foreach($cat7arts->take(10) as $key =>$art)
				@if($key == 0)
					<h3 style="border-bottom:3px solid #1abc9c; padding-bottom:5px;"><span style="padding:6px 12px; background:#1abc9c;">{{$art->category->title}}</span></h3>
				@endif
				<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
					<div class="col-md-4">
						<div class="row">
							<a href="{{route('article.show',['article_slug'=> $art->slug])}}">
								<img src="{{asset('storage/assets/images/articles')}}/{{$art->image}}" width="100%" style="margin-left:-15px;" />
							</a>
						</div>
					</div>
					<div class="col-md-8">
						<div class="row" style="padding-left:10px;">
							<h4><a href="{{route('article.show',['article_slug'=> $art->slug])}}">{{$art->title}}</a></h4>
						</div>
					</div>
				</div>           
				@endforeach
				@endif
				<div class="col-md-12 text-center" style="padding:30px 0px;">
					@if ($annoncerightseul)
					<a href="{{$annoncerightseul->url}}">
						<img src="{{asset('storage/assets/images/annonces')}}/{{$annoncerightseul->image}}" />
					</a>
					@endif
				</div>    
			</div>
			{{-- Annonce --}}
			<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 60px 15px; margin-top:30px;">
				<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
					<h3 style="border-bottom:3px solid #1abc9c; padding-bottom:5px;"><span style="padding:6px 12px; background:#1abc9c;">Publicité</span></h3>
					@foreach($annonces as $key=>$annonce)
					@if($key == 0)	
					<a href="{{$annonce->url}}">
						<img src="{{asset('storage/assets/images/annonces')}}/{{$annonce->image}}" width="100%" style="margin-bottom:15px;" />
					</a>
					@endif
					@endforeach
				</div>
				@foreach($annonces as $key=>$annonce)
				@if($key > 0 && $key < count($annonces))	
				<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
					<div class="col-md-4">
						<div class="row">
							<a href="{{$annonce->url}}">
								<img src="{{asset('storage/assets/images/annonces')}}/{{$annonce->image}}" width="100%" style="margin-left:-15px;" />
							</a>
						</div>
					</div>
					<div class="col-md-8">
						<div class="row" style="padding-left:0px;">
							<h4><a href="{{$annonce->url}}">{{$annonce->title}}</a></h4>
						</div>
					</div>
				</div>
				@endif
				@endforeach
			</div>
          {{-- sliders --}}
          <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
          	<div class="col-md-12">
            	<h3 style="border-bottom:3px solid #1abc9c; padding-bottom:5px;"><span style="padding:6px 12px; background:#1abc9c;">La Republique</span></h3>
            </div>          	
          	<div class="col-md-12">
            	<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
					  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					  <li data-target="#myCarousel" data-slide-to="1"></li>
					  <li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
				  
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						@if($republiques)
							@foreach($republiques as $key => $republique)
								<div class="item {{($key==1) ?'active':''}}" style="height: 250px !important">
									<a href="{{route('article.show',['article_slug'=> $republique->slug])}}">
									<img src="{{asset('storage/assets/images/articles')}}/{{$republique->image}}">
									<span class="caption-adv" style="color:#fff;">{{$republique->title}}</span></a>
								</div>	
							@endforeach
						@endif
				  
						<!-- Left and right controls -->
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
						</a>
				  	</div>
            	</div>
        	</div>
			{{-- fin slider --}}

		