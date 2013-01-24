<?php

class Tweet extends Eloquent {
	public static $timestamps = true;

	public function get_created_at(){
		$dateObj = $this->get_attribute('created_at');
		var_dump($dateObj);
		return date('j-M-y H:i',strtotime($this->get_attribute('created_at')));
	}
	// original get_updated_at (and get_created_at) line replaced with more verbose steps
	// return date('j-M-y H:i',strtotime($this->get_attribute('updated_at')));
	public function get_updated_at(){
		$dateObj = $this->get_attribute('updated_at');
		var_dump($dateObj);
		return date('j-M-y H:i',strtotime($dateObj->date));
	}
	// return time in a relative format using 
	public function get_tweettime(){
		return $this->update_time( $this->get_attribute('tweettime') );
	}
	// tweets are stored "securely" these processes read special chars.
	// implement base64 to encrypt tweets? is there a need for this?
	public function get_tweet(){
		return htmlspecialchars_decode(html_entity_decode($this->get_attribute('tweet')));
	}

	// private functions below

	// function returns relative time based of an int time value
	private function update_time($date,$breakdown=2) {
      $difference = time() - $date;
      $retval = null;
      $periods = array('dec' => 315360000,
          'yr' => 31536000,
          'month' => 2628000,
          'w' => 604800, 
          'd' => 86400,
          'h' => 3600,
          'm' => 60,
          's' => 1);
                                   
      foreach ($periods as $key => $value) {
          if ($difference >= $value) {
              $time = floor($difference/$value);
              $difference %= $value;
              $retval .= ($retval ? ' ' : '').$time.' ';
              // $retval .= (($time > 1) ? $key.'s' : $key);
              $retval .= $key;
              $breakdown--;
          }
          if ($breakdown == '0') { break; }
      }
      return ''.$retval.'';      
	}
}