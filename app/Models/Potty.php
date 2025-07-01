<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Potty extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'dog_id',
        'potty_type',
        'potty_time',
        'notes',
    ];

    public static function getLastPotty($dog_id, $potty_type): string|null
    {
        $latest_potty = null;

        $last_potty = DB::table('potties')
            ->where('dog_id', $dog_id)
            ->where('potty_type', $potty_type)
            ->orderBy('potty_time', 'desc')
            ->first();

        if ($last_potty) {
            if (Carbon::parse($last_potty->potty_time)->isToday()) {
                $latest_potty = 'today';
            } elseif (Carbon::parse($last_potty->potty_time)->isYesterday()) {
                $latest_potty = 'yesterday';
            } else {
                $latest_potty = date_format(Carbon::parse($last_potty->potty_time), 'F j');
            }
            $latest_potty .= ' at ' . date_format(Carbon::parse($last_potty->potty_time), 'g:ia');
        }

        return $latest_potty;
    }
}