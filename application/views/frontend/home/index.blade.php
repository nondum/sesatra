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
		<div class="marketing">
			<p>Welcome to <b>Se-Sa-Tra</b>. This project leverages the vocal platform Twitter to gather, process &amp; present information about the level of satisfaction of the common consumer in the <b>Zambian</b> market. The project has so far processed <strong>{{ $counts['total']}}</strong> <b>views</b>, <b>opinions</b> &amp; <b>experiences</b> of everyday individuals.</p>
		</div>

      <div class="scoreboard row-fluid">
        <div class="score span3">
          <strong>{{ $counts['month'] }}</strong>  tweets in the last month
        </div>
        <div class="score span3">
          <strong>{{ $counts['week'] }}</strong>  tweets in the last week
        </div>
        <div class="score span3">
          <strong>{{ $counts['day'] }}</strong>  tweets in the last day
       </div>
        <div class="score span3">
          <strong>{{ $counts['hour'] }}</strong>  tweets in the last hour
        </div>
      </div>

        
		<hr>
        <footer>
            <p>Conceived by <a href="http://twitter.com/twoseats">@twoSeats</a></p>
            <p>Built using <a href="http://twitter.com/twoseats">@laravelphp</a> &amp; <a href="http://twitter.com/twoseats">@twbootstrap</a></p>
            <p>Check out Se-Sa-Tra on <a href="http://github.com">GitHub</a></p>
            <br><p><small>read the {{ HTML::link('fineprint', 'fine print') }}</small></p>
        </footer>
    </div> <!-- /container -->
@endsection

@section('endscripts')
    @parent
@endsection