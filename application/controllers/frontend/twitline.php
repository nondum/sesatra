<?php
class Frontend_Twitline_Controller extends Base_Controller
{

    public $restful = true;
    public $views = 'tweets';

    public $items_per_page = 15;

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

    public function get_index()
    {
    	return $this->get_view();
    }

    public function get_view($needle = 'zesco'){
    	// get tweets from database
        // TODO:: request time based tweets (last hour, last day)
    	$this->data[$this->views] = Tweet::where('searchtopic', '=', $needle)->order_by('tweettime','desc')->take(50)->paginate();
        foreach ($this->periods as $k => $v) {
            $counts[$k] = $this->count_last($v);
        }
        $this->data['counts'] = $counts;
        return View::make('frontend.'.$this->views.'.index',$this->data);
        // return var_dump($this->data['tweets']->results);
    }

    // ######********
    // TODO: add constraint to only count the relevant tweet topic.
    // ######******** IMPORTANT!
    private function count_last($duration){
        $oldesttime = time() - ($duration);
        return Tweet::where('tweettime','>',$oldesttime)->count();
    }

}