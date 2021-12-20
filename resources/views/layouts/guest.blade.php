{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html> --}}

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LEMOUKTALI - PARODIE & SARITE</title>
<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/style.css')}}" rel="stylesheet" type="text/css" />

@livewireStyles

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</head>

<body>

	{{-- en tete --}}
	<livewire:header />
<div class="col-md-12 main-menu">
	<div class="col-md-10 menu">
		<nav class="navbar">
			<div class="navbar-header">
    			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar"> 
					<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
        		</button>
        		<span class="navbar-brand"><font color="#1abc9c">LEM</font><font color="#2ca0c9">OUKTALI</font></span>
    		</div>
    		<div class="collapse navbar-collapse" id="mynavbar">
				
    			{{-- Include menu --}}
				<livewire:navigation /> 

			</div>
		</nav>
	</div>
	<div class="col-md-2">
        <div class="search">
            <input type="search" id="search_content" class="form-control" wire:model="text"/>
            <span class="glyphicon glyphicon-search search-btn"></span>
			<div id="search-output"></div>
        </div>
    </div>
</div> 

{{$slot}}

{{-- footer --}}

<livewire:footer />

{{-- tinymce --}}
<script src="https://cdn.tiny.cloud/1/z45ld3xrt4c75nj42a7zx5puc7nq8464gc9vsmlhpam9qls3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

@livewireScripts
<script>            
	$(document).ready(function() {
		var duration = 500;
		$(window).scroll(function() {
			if ($(this).scrollTop() > 500) {
				$('.goto').fadeIn(duration);
			} else {
				$('.goto').fadeOut(duration);
			}
		});

		$('.goto').click(function(event) {
			event.preventDefault();
			$('html').animate({scrollTop: 0}, duration);
			return false;
		})

		// $('#search-content').keyup(function(){
		// 	var text = $('#search-content').val();
		// 	if(text.length < 1){
		// 		$('#search-output').hide();
		// 		return false;
		// 	}else{
		// 		$.ajax({
		// 			type : "get",
		// 			url : "{{url('search-content')}}",
		// 			data : {text:text},
		// 			success:function(res){
		// 				$('#search-output').show();
		// 				$('#search-output').html(res);
		// 			}
		// 		})
		// 	}
		// })
	});
</script>

@stack('scripts')
</body>
</html>
