<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8 <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9 <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Service Satisfaction Tracker">
    <meta name="author" content="Twaambo Haamucenje">
	
	{{ HTML::style('css/bootstrap.css') }}
	<style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
	{{ HTML::style('css/bootstrap-responsive.css') }}
	{{ HTML::style('css/style.css') }}

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!-- Le fav icons -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

	<title>@yield('title')</title>
</head>
<body>
	@yield('content')
	

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{ asset('js/jquery-1.8.1.min.js') }}"></script>
		<script src="<?=asset('js/admin/jquery-ui-custom.js')?>"></script>
		<script src="<?=asset('js/admin/bootstrap.js')?>"></script>


	@yield('scripts')
</body>
</html>