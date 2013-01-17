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
        
        //first check that the query being fed is valid
        $q = $this->checkQuery($q);

        //talk to YQL
        $yqlQuery = 'SELECT * FROM twitter.search WHERE q=\''.$q.'\'';
        // http://developer.yahoo.com/yql/console/?q=SELECT%20*%20FROM%20twitter.search%20WHERE%20q%3D'zesco'&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys
        $req = 'http://query.yahooapis.com/v1/public/yql?q='.urlencode($yqlQuery).'&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys';
        echo $req;
        $results = json_decode(file_get_contents('http://query.yahooapis.com/v1/public/yql?q='.urlencode($yqlQuery).'&format=json&diagnostics=false&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys'))->query->results->results;

        var_dump($results[0]);
        var_dump($results);
        
        $save = json_encode($results);
        file_put_contents('results'.date('Y-m-d H_i_s').'.json', $save);

        if($results){
            $this->get_populate($results, $q);
        }
    }

    public function get_populate($data = false, $query){
        //import tweets from json files
        $tweets = Importer::runTweetImport($data, $query);
        /*var_dump($tweets[10]);
        var_dump($tweets[11]);
        var_dump($tweets[12]);*/
        if($tweets != false){
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
        }else{
            echo 'no tweets were available for processing';
        }
    }

    private function addTweetsToDB($tweets){
        var_dump($tweets);
        $result = Tweet::insert($tweets);
        if ($result === FAlSE)
            throw new Exception("Database entry failed. A problem was experienced.");
        return true;
    }
    private function checkQuery($q){
        // ZESCO, Zanaco, I-connect,Barclays bank,MTN Zambia, Airtel zambia
        $q = str_replace('-', ' ', (strtolower($q)));
        $validQueries = array('zesco', 'zanaco', 'mtn zambia', 'airtel zambia', 'barclays zambia', 'fnb zambia', 'zamtel');
        if(in_array($q, $validQueries)){
            return $q;
        }else{
            return 'zesco';
        }
    }

}