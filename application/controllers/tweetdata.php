<?php

class Tweetdata_Controller extends Base_Controller {

	public $periods = array(
            /*'decade' => 315360000,
            'year' => 31536000,*/
            'month' => 2628000,
            'week' => 604800, 
            'day' => 86400,
            'hour' => 3600,
            /*'minute' => 60,
            'second' => 1*/
        );

	// ######********
    // TODO: add constraint to only count the relevant tweet topic.
    // ######******** IMPORTANT!
    public function count_last($duration){
        $oldesttime = time() - ($duration);
        return Tweet::where('tweettime','>',$oldesttime)->count();
    }

    public function count_days(){
        $timestamp = strtotime("midnight today");

        // var_dump($timestamp);
        // var_dump(date('Y-m-d H:i:s', $timestamp));
        $days = 7;
        $dayDuration = $this->periods['day'];
        $oldest = $newest = $currentTime = $timestamp;
        $counts = array();

        for($i = 0; $i < $days; $i++){
            $oldest = $newest - $dayDuration;
            // echo 'get tweets older than '.date('Y-m-d H:i:s', $newest).' &amp; newer than '.date('Y-m-d H:i:s', $oldest).'<br>';
            // return DB::table('users')->where_between('updated_at', '2000-10-10', '2012-10-10')->get();
            // echo Tweet::where_between('tweettime', $newest, $oldest)->count().'<br>';
            $counts[date('Y-m-d', $newest)] = Tweet::where('tweettime','>',$oldest)->where('tweettime','<',$newest)->count();
            // echo $counts[date('Y-m-d', $newest)].'<br>';
            $newest = $newest - $dayDuration;

        }
        // var_dump($counts);
        return $counts;
    }

}