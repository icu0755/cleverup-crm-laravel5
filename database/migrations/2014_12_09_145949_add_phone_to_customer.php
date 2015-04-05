<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneToCustomer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('customer', function($table)
        {
            /** @var $table Blueprint */
            $table->string('phone', 11)->after('lastname');
        });
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('customer', function($table)
        {
            /** @var $table Blueprint */
            $table->dropColumn('phone');
        });
	}

}
