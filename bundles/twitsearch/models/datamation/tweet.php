<?php
namespace Twitsearch\Model\Datamation;

use \Eloquent;

class Tweet extends Eloquent {
	public static $timestamps = true;

	public function get_created_at(){
		return date('j-M-y H:i',strtotime($this->get_attribute('created_at')));
	}
	public function get_updated_at(){
		// return date('j-M-y H:i',strtotime($this->get_attribute('updated_at')));
		$dateObj = $this->get_attribute('updated_at');
		var_dump($dateObj);
		return date('j-M-y H:i',strtotime($dateObj->date));
	}
	public function get_time(){
		return $this->get_attribute('time');
	}
}