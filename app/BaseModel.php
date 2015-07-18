<?php
/**
 * Created by IntelliJ IDEA.
 * User: vi
 * Date: 18.07.15
 * Time: 15:35
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            static::setNullWhenEmpty($model);
            return true;
        });
    }

    private static function setNullWhenEmpty($model)
    {
        foreach($model->toArray() as $name => $value) {
            if (empty($value)) {
                $model->{$name} = null;
            }
        }
    }
}