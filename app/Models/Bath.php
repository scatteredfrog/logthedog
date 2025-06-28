<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Bath extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'dog_id',
        'bath_time',
        'notes',
    ];

    /**
     * Get the latest bath for a specific dog.
     *
     * @param int $dog_id
     *
     * @return string
     */
    public static function getLastBath($dog_id): string
    {
        $last_bath = DB::table('baths')->where('dog_id', $dog_id)
            ->orderBy('bath_time', 'desc')
            ->first();

        $latest_bath = '- no baths logged yet.';

        if ($last_bath) {
            if (Carbon::parse($last_bath->bath_time)->isToday()) {
                $latest_bath = 'today';
            } else {
                $latest_bath = date_format(Carbon::parse($last_bath->bath_time), 'F j, Y');
            }
            $latest_bath .= ' at ' . date_format(Carbon::parse($last_bath->bath_time), 'g:ia');
        }

        return $latest_bath;
    }

}
