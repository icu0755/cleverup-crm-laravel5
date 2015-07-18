<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customer', function(Blueprint $table)
		{
			DB::statement('ALTER TABLE customer MODIFY group_id INT NULL');
//			postgres
//			DB::statement('ALTER TABLE customer ALTER COLUMN group_id DROP NOT NULL');
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
			DB::statement('ALTER TABLE customer MODIFY group_id INT NOT NULL');
//			postgres
//			DB::statement('ALTER TABLE customer ALTER COLUMN group_id SET NOT NULL');
		});
	}

}
