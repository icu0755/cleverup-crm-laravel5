<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class EventSchedule extends Model
{
    use ValidatingTrait;

    protected $fillable = [
        'group_id',
        'day_of_week',
        'time_from',
        'time_to',
    ];

    protected $rules = [
            'group_id'    => 'required|exists:customer_group,id',
            'day_of_week' => 'required|numeric|between:0,6',
            'time_from'   => 'required|date_format:H:i',
            'time_to'     => 'required|date_format:H:i',
        ];

    protected $table = 'event_schedule';

    public function group()
    {
        return $this->belongsTo('App\CustomerGroup', 'group_id');
    }
} 