<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupIdToCustomerTable extends Migration {

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
            $table->integer('group_id')->after('id');
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
            $table->dropColumn('group_id');
        });
	}

}
