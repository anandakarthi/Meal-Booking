<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealBooking extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'core_meal_booking';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

}
