<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealConfig extends Model {
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'core_meal_config';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
