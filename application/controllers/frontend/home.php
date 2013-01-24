<?php
class Frontend_Home_Controller extends Tweetdata_Controller
{

    public $restful = true;
    public $views = 'home';

    public $items_per_page = 15;

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
}