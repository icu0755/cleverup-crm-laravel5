<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerGroupComment extends Model
{
    protected $table = 'customer_group_comment';

    protected $fillable = array(
        'group_id',
        'comment',
    );
} 