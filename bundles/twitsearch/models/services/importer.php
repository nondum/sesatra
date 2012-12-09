<?php namespace Twitsearch\Model\Services;

use \Eloquent;

class Importer{

    public static function runTweetImport(){
        $filelist = array(
'results2012-12-06 14_14_42.json',
'results2012-12-06 14_31_38.json',
'results2012-12-06 15_32_51.json',
'results2012-12-06 15_58_59.json',
'results2012-12-06 16_18_09.json',
'results2012-12-06 16_47_59.json',
'results2012-12-06 17_02_07.json'
        );
    
        $jsondata = array();

        // echo json_decode( file_get_contents('..\\'.$filelist[0]) );
        
        foreach ($filelist as $file => $filename) {
            echo '..\\'.$filename.'<br>';

            $jsondata[] = json_decode( file_get_contents('..\\'.$filename) );
        }
            echo 'CWD: '.getcwd().'<br>';
            echo 'size of jsondata: '.sizeof($jsondata);

            var_dump($jsondata[0][0]);

        
            $tweet = array(
                    'userhandle' => $jsondata[0][0]->from_user,
                    'username' =>  $jsondata[0][0]->from_user_name,
                    'userid' => $jsondata[0][0]->from_user_id,
                    'userpic' => $jsondata[0][0]->profile_image_url,
                    'tweet' => $jsondata[0][0]->text,
                    'tweetid' => $jsondata[0][0]->id,
                    'tweetlocation' => $jsondata[0][0]->geo,
                    'tweettime' => strtotime($jsondata[0][0]->created_at)
                );

            var_dump($tweet);

            $tweets = array();
            $tweetids = array();
            foreach ($jsondata as $jdfile) {
                foreach ($jdfile as $tweet) {
                    // echo $tweet->text.'<br>';
                    if(!in_array($tweet->id, $tweetids)){
                        $tweets[] = array(
                            'userhandle' => htmlentities($tweet->from_user),
                            'username' =>  htmlentities($tweet->from_user_name),
                            'userid' => $tweet->from_user_id,
                            'userpic' => $tweet->profile_image_url,
                            'tweet' => htmlspecialchars(htmlentities($tweet->text)),
                            'tweetid' => $tweet->id,
                            'tweetlocation' => 'null',
                            'tweettime' => strtotime($tweet->created_at),
                            'searchtopic' => 'zesco'
                        );
                    }
                    $tweetids[] = $tweet->id;
                }
            }

        echo sizeof($tweets);
        echo 'exiting importer';
        // var_dump($tweets);

        return $tweets;

    }

}