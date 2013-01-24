<?php
class Frontend_Twitline_Controller extends Tweetdata_Controller
{

    public $restful = true;
    public $views = 'tweets';

    public $items_per_page = 15;

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

    public function get_viewAll(){
        // get tweets from database
        // TODO:: request time based tweets (last hour, last day)
        $this->data[$this->views] = Tweet::order_by('tweettime','desc')->take(50)->paginate();
        foreach ($this->periods as $k => $v) {
            $counts[$k] = $this->count_last($v);
        }
        $this->data['counts'] = $counts;
        return View::make('frontend.'.$this->views.'.index',$this->data);
        // return var_dump($this->data['tweets']->results);
    }
}