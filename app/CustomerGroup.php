<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Watson\Validating\ValidatingTrait;

class CustomerGroup extends Model
{
    use SoftDeletes;
    use ValidatingTrait;

    protected $fillable = [
        'groupname',
    ];

    protected $rules = [
        'groupname' => 'required|min:3',
    ];

    protected $table = 'customer_group';

    public function comments()
    {
        return $this->hasMany('App\CustomerGroupComment', 'group_id');
    }

    public function customers()
    {
        return $this->hasMany('App\Customer', 'group_id');
    }
} 