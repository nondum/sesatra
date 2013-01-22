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
        padding-bottom: 40px;

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
	@section('navigation')
		<div class="navbar navbar-fixed-top">
		  <div class="navbar-inner">
		    <div class="container">
		      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </a>
		      <a class="brand" href="{{ URL::base(); }}">se-sa-tra | an open project</a>
		      <div class="nav-collapse">
		        
		      </div><!--/.nav-collapse -->
		    </div>
		  </div>
		</div>
    @yield_section

	<div class="container">

	@yield('content')
        
		<hr>
        <footer>
            <p>Find more info on the <a href="http://blog.sesatra.com">project blog</a>.</p>
            <p>Follow the project on Twitter <a href="http://twitter.com/sesatraproject">@SesatraProject</a></p>
            <p>Conceived by <a href="http://twitter.com/twoseats">@twoSeats</a></p>
            <p>Built using <a href="http://twitter.com/laravelphp">@laravelphp</a>, <a href="http://twitter.com/twbootstrap">@twbootstrap</a> &amp; <a href="http://twitter.com/yql">@yql</a></p>
            <p>Check out Se-Sa-Tra on <a href="http://github.com/SoliloquyLabs/sesatra">GitHub</a></p>
        </footer>
    </div> <!-- /container -->
	@yield('modals')
	
	@section('endscripts')
		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{ asset('js/jquery-1.8.1.min.js') }}"></script>
		<script src="{{ asset('js/jquery-ui-custom.js') }}"></script>
		<script src="{{ asset('js/bootstrap.js') }}"></script>
	@yield_section

	@yield('scripts')
</body>
</html>