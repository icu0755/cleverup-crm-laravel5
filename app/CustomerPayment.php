<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CustomerPayment extends Model
{
    protected $fillable = [
        'customer',
        'paid_at',
        'amount',
    ];

    public function __construct(array $attributes = [])
    {
        $attributes['paid_at'] = new Carbon();
        parent::__construct($attributes);
    }

    public function customer()
    {
        return $this->hasOne('App\Customer');
    }

    public function prettyAmount()
    {
        return number_format($this->amount / 100, 2, '.', ' ');
    }
}
