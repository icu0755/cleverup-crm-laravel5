<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Attendance extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attendance', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('customer_id');
            $table->foreign('group_id')->references('id')->on('customer_group')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
            $table->datetime('was_at');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('attendance');
	}

}
