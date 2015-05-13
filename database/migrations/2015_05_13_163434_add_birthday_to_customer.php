<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBirthdayToCustomer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customer', function(Blueprint $table)
		{
            $table->string('email')->after('phone');
            $table->date('birthday')->after('email');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('customer', function(Blueprint $table)
		{
			$table->dropColumn('email');
			$table->dropColumn('birthday');
		});
	}

}
