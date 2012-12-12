@layout('templates.legal')

@section('title')
    Sesatra | an open project
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
    <div class="marketing"><small>
        <p>The disclosure:</p>

        <p>The goal of Sesatra is to determine consumer sentiment and collect data regarding consumer experience with service providers.
        To achieve this goal, Sesatra collects and archives tweets that contain keywords associated with the concerned service providers. As an example tweets are collected about the Electricity Provider ZESCO.
        Tweets are kept by the Sesatra application in order to accurately produce numerical data and determine sentiment.</p>

        <p>The Sesatra project is not affiliated in any way with any of the service providers tracked by the project. At no point will the Sesatra project voluntarily make available any of the raw tweet data collected to the service providers being tracked or any other third party for any reason whatsoever; this includes gratis or for pay.</p>

        <p>The Sesatra project only makes use of public tweet data within the bounds of the Twitter "Rules of the Road for Developers". Tweets collected by the Sesatra project may be used in offshoot projects to expand on the functionality of the Sesatra application.</p>

        <p>Sesatra is an open source project and takes no responsibility for the actions of anyone using this software in derived products.</p>
    </small></div>       

@endsection

@section('endscripts')
    @parent
@endsection