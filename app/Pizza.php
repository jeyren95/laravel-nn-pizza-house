<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// laravel automatically connects this model to the plural form of its name
// i.e. pizzas table => Pizza model
// to specify the table that you want to connect to the model
    // $table = 'table_name'

// Models naming convention => singular of whatever the table is called i.e. pizzas table = Pizza model
class Pizza extends Model
{
    // take the array and turn the array into a json string (vice-versa)
    protected $casts = [
        "toppings" => "array"
    ];
}
