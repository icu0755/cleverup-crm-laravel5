<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lesson';

    protected $fillable = ['group_id', 'given_at', 'group_id'];

    public function group()
    {
        return $this->belongsTo('\App\CustomerGroup');
    }
}