<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealName extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'core_meal_name';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

}
