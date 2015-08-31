<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $table = 'attendance';

	protected $fillable = ['group_id', 'customer_id', 'was_at'];

    public $timestamps = false;

}
