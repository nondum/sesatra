<?php
use Twitsearch\Model\Services\Importer,
    Twitsearch\Model\Datamation\Tweet,
    Twitsearch\Model\Datamation\Topic;

class Twitsearch_Tweets_Controller extends Controller
{

    public $restful = true;
    public $views = 'tweets';
        
    private $validQueries = array();

    function __construct(){
        $topics = Topic::all();
        
        foreach($topics as $topic){
            $this->validQueries[] = $topic->query;
        }
    }
    function __destruct(){}

    public function get_run($q = 'zesco'){
        //get latest tweets from twi'er
        
        //first check that the query being fed is valid
        $q = $this->checkQuery($q);

        // prep YQL query
        $yqlQuery = 'SELECT * FROM twitter.search WHERE q=\''.$q.'\'';
        
        //talk to YQL
        $req = 'http://query.yahooapis.com/v1/public/yql?q='.urlencode($yqlQuery).'&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys';
        // echo $req;

        $results = json_decode(file_get_contents('http://query.yahooapis.com/v1/public/yql?q='.urlencode($yqlQuery).'&format=json&diagnostics=false&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys'))->query->results->results;

        // var_dump($results[0]);
        // var_dump($results);
        
        $save = json_encode($results);
        file_put_contents('results'.date('Y-m-d H_i_s').'.json', $save);

        if($results){
            $this->get_populate($results, $q);
        }
    }
    public function get_runAll(){
        //batch get latest tweets from twi'er
        foreach ($this->validQueries as $q) {

            $q = $this->checkQuery($q);

            // prep YQL query
            $yqlQuery = 'SELECT * FROM twitter.search WHERE q=\''.$q.'\'';
            
            //talk to YQL
            $req = 'http://query.yahooapis.com/v1/public/yql?q='.urlencode($yqlQuery).'&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys';
            // echo $req;
            try{
                $results = file_get_contents('http://query.yahooapis.com/v1/public/yql?q='.urlencode($yqlQuery).'&format=json&diagnostics=false&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');

                $results = json_decode($results);
                
                // in the case that yql returns null the null value is at this point...
                $var = $results->query;

                // check that yql query didn't return null
                if($var->results != null){
                    // try to retrieve yql data, else catch exception....
                    try{$results = $results->query->results->results;}
                    catch(Exception $e){
                        // var_dump($results);
                        var_dump($e);
                    }

                    // print a single result from queries
                    // var_dump($results[0]);
                    
                    // save output to a file...
                    // this data is saved as jsondata
                    $save = json_encode($results);
                    // file_put_contents('results'.date('Y-m-d H_i_s').'.json', $save);

                    // save data to database
                    $this->get_populate($results, $q); 
                }
            }catch(Exception $e){
                echo '<br>something bad happened....(query failed)<br>';
                var_dump($e);
            }
        }
    }

    public function get_populate($data = false, $query){
        //import tweets from json files
        $tweets = Importer::runTweetImport($data, $query);
        $count1 = $count2 = 0;

        if($tweets != false){
            foreach ($tweets as $tweet) {
                $twt = new Tweet($tweet);
                $exists = Tweet::where('tweetid', '=', $tweet['tweetid'])->first();
                // var_dump($exists);
                if($exists == null){
                    $twt->save();
                    $count1++;
                    // var_dump($tweet);
                }else{
                    $count2++;
                    // echo 'skipped tweet import<br>';
                }
            }
        }else{
            echo 'no tweets were available for processing';
        }
        echo 'Process completed<br>'.$count1.' rows added to database<br>'.$count2.' rows skipped.';
    }

    private function addTweetsToDB($tweets){
        // var_dump($tweets);
        $result = Tweet::insert($tweets);
        if ($result === FAlSE)
            throw new Exception("Database entry failed. A problem was experienced.");
        return true;
    }
    private function checkQuery($q){
        $q = str_replace('-', ' ', (strtolower($q)));
        if(in_array($q, $this->validQueries)){
            return $q;
        }else{
            return $this->validQueries[0];
        }
    }

}