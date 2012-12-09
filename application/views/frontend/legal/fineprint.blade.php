@layout('templates.main')

@section('title')
    se-sa-tra | an open project
@endsection

@section('navigation')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('heading')
    service tracker
@endsection

@section('content')
	<div class="container">
		<div class="jumbotron">
	        <h1>Service Satisfaction Tracker</h1>
	        <p class="lead">An open-project tracking consumer satisfaction of major service providers in Zambia.</p>
	      </div>
		

        
		<hr>
        <footer>
            <p>Conceived by <a href="http://twitter.com/twoseats">@twoSeats</a></p>
            <p>Built using <a href="http://twitter.com/twoseats">@laravelphp</a> &amp; <a href="http://twitter.com/twoseats">@twbootstrap</a></p>
            <p>Check out Se-Sa-Tra on <a href="http://github.com">GitHub</a></p>
            <p><small></small></p>
        </footer>
    </div> <!-- /container -->
@endsection

@section('endscripts')
    @parent
@endsection