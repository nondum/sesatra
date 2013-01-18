<?php

class Twitsearch_Fetch_Task {
 
    public function run($arguments)
    {
        // run a batch query for new data from twitter.
    	Bundle::start('twitsearch');
    	Controller::call('twitsearch::tweets@runAll');
    }
 
}