<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BAKER'S CAKE</title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('public/user/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/user/vendors/colorbox/example3/colorbox.css') }}">
	<link rel="stylesheet" href="{{ asset('public/user/rs-plugin/css/settings.css') }}">
	<link rel="stylesheet" href="{{ asset('public/user/rs-plugin/css/responsive.css') }}">
	<link rel="stylesheet" title="style" href="{{ asset('public/user/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('public/user/css/animate.css') }}">
	<link rel="stylesheet" title="style" href="{{ asset('public/user/css/huong-style.css') }}">
	<script type="text/javascript" src="{{ asset('public/user/js/jquery.js') }}"></script>
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<body>

	@include('frontend.layout.header')
	</div> <!-- #header -->
	<div class="rev-slider">
		
		@yield('content')

	</div> <!-- .container -->

	@include('frontend.layout.footer')


	<!-- include js files -->
	
	<script src="{{ asset('public/user/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js') }}"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="{{ asset('public/user/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
	<script src="{{ asset('public/user/vendors/colorbox/jquery.colorbox-min.js') }}"></script>
	<script src="{{ asset('public/user/vendors/animo/Animo.js') }}"></script>
	<script src="{{ asset('public/user/vendors/dug/dug.js') }}"></script>
	<script src="{{ asset('public/user/js/scripts.min.js') }}"></script>
	<script src="{{ asset('public/user/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
	<script src="{{ asset('public/user/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
	<script src="{{ asset('public/user/js/waypoints.min.js') }}"></script>
	<script src="{{ asset('public/user/js/wow.min.js') }}"></script>
	<!--customjs-->
	<script src="{{ asset('public/user/js/custom2.js') }}"></script>
	
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
	<script type="text/javascript">
		$("div.alert").delay(3000).slideUp();
	</script>
</body>
</html>
