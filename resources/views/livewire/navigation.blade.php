<div>
    <ul class="nav nav-justified">
        <li><a href="/" class="active"><span class="glyphicon glyphicon-home"></span></a></li>
        @if($categories)
            @foreach($categories as $category)
                <li><a href="{{ route('categorie.show',['category_slug'=>$category->slug])}}" class="text-uppercase">{{$category->title}}</a></li> 
            @endforeach
        @endif
        
        {{-- admin condition --}}
        @if(Route::has('login'))
        @auth
            @if(Auth::user()->utype === 'ADM')
                <li class="dropdown">
                    <a class="dropdown-toggle text-uppercase" data-toggle="dropdown" href="#">{{Auth::user()->name}}
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route ('admin.home')}}">Tableau de Bord</a></li>
                        <li><a href="{{ route ('admin.categories')}}">Categories</a></li>
                        <li><a href="{{ route ('admin.settings')}}">Parametres</a></li>
                        <li><a href="{{ route ('admin.articles')}}">Articles</a></li>
                        <li><a href="{{ route ('admin.annonces')}}">Annonces</a></li>
                        <li><a href="{{ route ('admin.messages')}}">Messages</a></li>
                        <li><a href="{{ route ('admin.pages')}}">Pages</a></li>
                        <li><a href="{{ route ('admin.users')}}">Utilisateurs</a></li>
                        <li><a title="logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form') .submit();">Déconnexion</a></li>
                        <form id="logout-form" method="POST" action="{{ route('logout')}}">
                            @csrf
                        </form>  
                    </ul>
                </li>
            @else
                {{-- editor --}}
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Auth::user()->name}}
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Tableau de bord</a></li>
                        <li><a href="{{ route ('admin.articles')}}">Articles</a></li>
                        <li><a href="{{ route ('admin.annonces')}}">Annonces</a></li>
                        <li><a title="logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form') .submit();">Déconnexion</a></li>
                        <form id="logout-form" method="POST" action="{{ route('logout')}}">
                            @csrf
                        </form>  
                    </ul>
                </li>
            @endif
        @endif
        @endif
    </ul> 
</div>
