<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class meal extends Model
{
    protected $fillable = [
        'meal_name', 'meal_price','meal_status','meal_picture'
    ];
}
