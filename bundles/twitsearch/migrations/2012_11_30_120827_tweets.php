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
			$table->string('tweetid', 128)->unique();;
			$table->string('tweetlocation');
			$table->integer('tweettime');

			$table->string('searchtopic');
			// created_at | updated_at DATETIME
			$table->timestamps();
			$table->index('id');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		$Schema::drop('tweets');

	}

}