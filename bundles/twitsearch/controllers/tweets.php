<?php
use Twitsearch\Model\Services\Importer,
    Twitsearch\Model\Datamation\Tweet;

class Twitsearch_tweets_Controller extends Controller
{

    public $restful = true;
    public $views = 'tweets';

    public function get_index()
    {
    	$this->data[$this->views] = User::order_by('id','asc')->get();
        return View::make('admin.'.$this->views.'.index',$this->data);
    }

    public function get_run($q = 'zesco'){
    	//get latest tweets from twi'er
        $yqlQuery = 'SELECT * FROM twitter.search WHERE q='.$q.'';

        $results = json_decode(file_get_contents('http://query.yahooapis.com/v1/public/yql?q='.urlencode($yqlQuery).'&format=json&_maxage=10800&diagnostics=false&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys'))->query->results->results;

        var_dump($results[0]);
        var_dump($results);
        
        $save = json_encode($results);
        file_put_contents('results'.date('Y-m-d H_i_s').'.json', $save);
        // file_get_contents(filename)

        $sample = $results[0];

        $reltime = update_time($sample->created_at);
        $msg = $sample->text;
        echo '- '.$msg.'<br/>';
        echo $reltime;

        // function update_time($date,$breakdown=2) {
            $date = strtotime($date);

        //push latest fetch to database

        //visual feedback?
    }

    public function get_populate(){
        //import tweets from json files
        $tweets = Importer::runTweetImport();
        /*var_dump($tweets[10]);
        var_dump($tweets[11]);
        var_dump($tweets[12]);*/
        
        foreach ($tweets as $tweet) {
            $twt = new Tweet($tweet);
            $exists = Tweet::where('tweetid', '=', $tweet['tweetid'])->first();
            var_dump($exists);
            if($exists == null){
                $twt->save();
                var_dump($tweet);
            }else{
                echo 'skipped tweet import<br>';
            }
        }
    }

    private function addTweetsToDB($tweets){
        var_dump($tweets);
        $result = Tweet::insert($tweets);
        if ($result === FAlSE)
            throw new Exception("Database entry failed. A problem was experienced.");
        return true;
    }

}