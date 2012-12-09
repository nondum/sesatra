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

	@if ($tweets)
		@foreach($tweets->results as $twt)
		<div class="row">
			<div class="tweet row">
			    <div class="tweet_img">
			        <img src="{{ $twt->userpic }}">
			    </div>
			    <!--div class="tweet_right">
			    </div-->
			    	<div class="tweet_screen_name">
			        	<p>{{ $twt->username }}</p>
			        	<p>@{{ $twt->userhandle }}</p>
			    	</div>
			    	<div class="tweet_date">
				        <p>{{ $twt->tweettime }}</p>
			    	</div>
			</div>
			<div class="tweet row">
		    	<div class="tweet_text">
		        	<p>{{ $twt->tweet }}</p>
		    	</div>
		    </div>
	    </div>

		        <!--p><a class="btn" href="#">View details &raquo;</a></p-->

		@endforeach

	    <div class="row pagination-centered">
			{{ $tweets->links(1) }}
		</div>
	@endif



        
		<hr>
        <footer>
            <p>Conceived by @twoSeats</p>
            <p>Built using @twbootstrap &amp; @laravelphp</p>
        </footer>
    </div> <!-- /container -->
@endsection

@section('endscripts')
    @parent
@endsection