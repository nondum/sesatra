<?php
 
class Feed_Controller extends Tweetdata_Controller
{
	public function action_index(){
		$today = date('d-m-Y');
		// echo $today.' is today<br>';
		$dayCounts = $this-> count_days();
		$feedTime = date('r', strtotime("midnight today"));

		$feed = Feed::make();
		$feed->logo(asset('img/logo.png'))
			  ->icon(URL::home().'favicon.ico')
			  ->title()->add('text', 'Sesatra Stats Feed')->add('html', 'Sesatra Stats Feed')->up()
              ->author()->name('Sesatra')->email('sesatra@outlook.com')->up()
              ->description()->add('text', 'Statistics from Sesatra.com')->up()
              ->baseurl(URL::base());
        foreach ($dayCounts as $key => $val ) {

			$post = array(
					'title' => 'Sesatra Statistics for '.$today,
					'content' => 'Sesatra has tracked '.$val.' total tweets today ('.$today.').',
				);
		    $feed->entry() ->title()->add('text', $post['title'])->up()
		              ->updated($feedTime)
		              ->author()->name('Sesatra')->email('sesatra@outlook.com')->up()
		              ->content()->add('text', $post['content'])
		                         ->add('html', HTML::decode($post['content']));
		}
	    $feed->feed()->Rss20();
	}
	 
	public function action_atom()
	{
		$feed = Feed::make();
		 
		// TODO: add feed info
		 
		$feed->Atom();
	}
	 
	public function action_rss092()
	{
		$feed = Feed::make();
		 
		// TODO: add feed info
		 
		$feed->Rss092();
	}
}