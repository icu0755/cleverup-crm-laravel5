<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventSchedule extends Migration
{
    const TABLE_NAME = 'event_schedule';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(static::TABLE_NAME, function($table)
        {
            $daysOfWeek = range(0, 6);

            /** @var $table Blueprint */
            $table->increments('id');
            $table->integer('group_id');
            $table->enum('day_of_week', $daysOfWeek);
            $table->time('time_from');
            $table->time('time_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(static::TABLE_NAME);
    }
}
