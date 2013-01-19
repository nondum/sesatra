<?php

class Twitsearch_Tweets {

	/**
	 * create tables for use with the twitsearch bundle
	 *
	 * 
	 */
	public function up()
	{
		//
		Schema::table('tweets', function($table)
		{
			$table->engine = 'InnoDB';
			$table->create();
			$table->increments('id');
			$table->string('userhandle', 128);
			$table->string('username', 128);
			$table->string('userid', 128);
			$table->string('userpic');
			$table->string('tweet', 141);
			$table->string('tweetid', 128)->unique();
			$table->string('tweetlocation');
			$table->integer('tweettime');

			$table->string('searchtopic');
			// created_at | updated_at DATETIME
			$table->timestamps();
			$table->index('id');
		});

		Schema::table('topics', function($table)
		{
			$table->engine = 'InnoDB';
			$table->create();
			$table->increments('id');
			$table->string('topicname', 30);
			$table->string('query', 20);
			// created_at | updated_at DATETIME
			$table->timestamps();
			$table->index('id');
		});

		// seed topics table
    	$validQueries = array('zesco', 'zanaco', 'mtn zambia', 'airtel zambia', 'barclays zambia', 'fnb zambia', 'zamtel', 'kafubu');

    	foreach ($validQueries as $q) {
    		DB::table('topics')->insert(array('topicname' => $q, 'query' => $q));
    	}



	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('tweets');
		Schema::drop('topics');

	}

}