<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTestUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('users')->insert(
			array(
				'username' => 'guest',
				'password' => Hash::make('changeme'))
			);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() //Not working
	{
		DB::table('users')->where('username', 'guest')
						->where('password', Hash::make('changeme'))->delete();
	}
}
