<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Meal extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'dog_id',
        'meal_time',
        'notes',
    ];

    /**
     * Get the latest meal for a specific dog.
     *
     * @param int $dog_id
     *
     * @return string
     */
    public static function getLastMeal($dog_id): string
    {
        $last_meal = DB::table('meals')->where('dog_id', $dog_id)
                    ->orderBy('meal_time', 'desc')
                    ->first();
        $latest_meal = 'No meals logged yet.';

        if ($last_meal) {
            if (Carbon::parse($last_meal->meal_time)->isToday()) {
                $latest_meal = 'today';
            } else {
                $latest_meal = date_format($last_meal->meal_time, 'F j, Y');
            }
            $latest_meal .= ' at ' . date_format(Carbon::parse($last_meal->meal_time), 'g:ia');
        }

        return $latest_meal;
    }
}
