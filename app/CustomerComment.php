<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerComment extends Model
{
    protected $table = 'customer_comment';

    protected $fillable = ['comment'];
} 