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
		<div class="jumbotron">
	        <h1>Service Satisfaction Tracker</h1>
	        <p class="lead">An open-project tracking consumer satisfaction of major service providers in Zambia.</p>
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

	@if ($tweets->total > 0)
		@foreach($tweets->results as $twt)
		<div class="row">
			<div class="tweet row">
		    	<div class="tweet_date">
			        <p>{{ $twt->tweettime }}</p>
		    	</div>
		    	<div class="tweet_text">
		    		<a href="http://twitter.com{{ $twt->username }}">
			        	<img src="{{ $twt->userpic }}">
			        	<span><strong>{{ $twt->username }}</strong></span>  <span class="tweet_screen_name"><small>@{{ $twt->userhandle }}</small></span>
			        </a>
		        	<p>{{ $twt->tweet }}</p>
		    	</div>
		    </div>
	    </div>
		@endforeach
	    <div class="row pagination-centered">
			{{ $tweets->links(1) }}
		</div>
	@else
		<p class="lead">There no tweets to display. Either no data has been collected or there has been a problem. Sorry.</p>
	@endif

@endsection

@section('endscripts')
    @parent
@endsection