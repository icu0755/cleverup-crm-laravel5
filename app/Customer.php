<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Watson\Validating\ValidatingTrait;

class Customer extends Model
{
    use SoftDeletes;
    use ValidatingTrait;

    protected $fillable = ['firstname', 'lastname', 'phone', 'group_id', 'email', 'birthday'];

    protected $rules = [
        'firstname' => 'required|min:2',
        'lastname'  => 'min:2',
        'phone'     => 'digits:11',
        'group_id'  => 'exists:customer_group,id',
        'email'     => 'email',
        'birthday'  => 'date_format:Y-m-d',
    ];

    protected $table = 'customer';

    public function comments()
    {
        return $this->hasMany('App\CustomerComment');
    }

    public function group()
    {
        return $this->belongsTo('App\CustomerGroup', 'group_id');
    }

    public function scopeHasBirthday($query)
    {
        return $query->whereNotIn('birthday', ['0000-00-00', '1970-01-01']);
    }

    /**
     * Mutators
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = preg_replace('/^8/', '7', $value);
    }

    public function getUpcomingBirthdayAttribute()
    {
        $now = (new Carbon())->startOfDay();
        $year = $now->format('Y');
        $dob = new Carbon($this->birthday);
        $dob = new Carbon($dob->format("$year-m-d"));
        if ($now->gt($dob)) {
            $dob->addYear();
        }

        return $dob;
    }

    public function getUpcomingBirthdayDaysLeftAttribute()
    {
        return $this->upcomingBirthday->diffInDays();
    }

    public function __toString()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}