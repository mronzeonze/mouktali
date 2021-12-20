<div class="col-md-12 bottom">
    <div class="col-md-4">
        <h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #1abc9c;">A PROPOS DE NOUS</span></h3>
        <img src="{{asset('assets/images/book-icon.png') }}"  width="40" align="left" />
        {{-- <img src="{{asset('storage/assets/images/logos/logomouktali1.png')}}" height="70"/> --}}
        <span class="name"><font color="#1abc9c">MOU</font><font color="#fff">KTALI</font></span>
        <p align="justify">{{($setting)?$setting->about:''}}</p>
    </div>
    <div class="col-md-4">
        <div class="col-md-12">
            <h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #1abc9c;">LIEN RAPIDE</span></h3>
        </div>    
        <div class="col-md-6">
            <div class="row">
              <ul class="nav">
                <li><a href="{{ route('message')}}">NOUS CONTACTER</a></li>
                <li><a href="{{ route('apropos')}}">A PROPOS...</a></li>
            </ul> 
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
              <ul class="nav">
                @foreach($categories as $key => $category)
                    <li><a href="{{ route('categorie.show',['category_slug'=>$category->slug])}}" class="text-uppercase">{{$category->title}}</a></li>     
                @endforeach
            </ul> 
            </div>
        </div>    
    </div>
    <div class="col-md-4">
        <h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #1abc9c;">Nos Contact</span></h3>
        <span class="name"><font color="#1abc9c">MOU</font><font color="#fff">KTALI</font></span><br />
        Suivez nous sur:<br /><br />
        @if($setting)
            <a href="{{$setting->facebook}}"><img src="{{asset('assets/images/icon-fb.png') }}" /></a>
            <a href="{{$setting->twiter}}"><img src="{{asset('assets/images/icon-twitter.png') }}" /></a>
            <a href="#"><img src="{{asset('assets/images/icon-google.png') }}" /></a>
            <a href="{{$setting->instagram}}"><img src="{{asset('assets/images/icon-insta.png') }}" /></a>
            <a href="#top" class="goto"><span class="glyphicon glyphicon-chevron-up"></span></a>
        @endif
    </div>
</div>

<div class="col-md-12 text-center copyright">
	Copyright &copy; 2020-{{date('Y')}} <a href="{{route('home')}}"><span><font color="#1abc9c">MOU</font><font color="#fff">KTALI</font></span></a>
</div>


