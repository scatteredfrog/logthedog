<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'user_id',
        'breed',
        'color',
        'marks',
        'weight',
        'length',
        'height',
        'age',
        'birth_date',
        'gotcha_date',
        'microchip_number',
        'chip_company',
        'misc',
        'photo'
    ];

    public function meal(): HasMany
    {
        return $this->HasMany(Meal::class);
    }

    public function bath(): HasMany
    {
        return $this->HasMany(Bath::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function create(array $attributes = []): self
    {
        dd($attributes);
        $dog = new self($attributes);
        $dog->save();
    }

    public function attach(User $user): void
    {
        $this->users()->attach($user->id);
    }
}