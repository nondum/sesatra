<?php
class Frontend_Home_Controller extends Base_Controller
{

    public $restful = true;
    public $views = 'home';

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

    public function get_index(){
        // get general counts from database to show on the front page
        foreach ($this->periods as $k => $v) {
            $counts[$k] = $this->count_last($v);
        }
        $counts['total'] = Tweet::count();

        $this->data['counts'] = $counts;
        return View::make('frontend.'.$this->views.'.index',$this->data);
    }

    public function get_fine_print(){
        return View::make('frontend.legal.fineprint');
    }

    // private functions

    private function count_last($duration){
        $oldesttime = time() - ($duration);
        return Tweet::where('tweettime','>',$oldesttime)->count();
    }

}