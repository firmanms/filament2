<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function slides(): HasMany
    {
        return $this->hasMany(Slide::class);
    }

    public function related(): HasMany
    {
        return $this->hasMany(Related::class);
    }

    public function apis(): HasMany
    {
        return $this->hasMany(Api::class);
    }

    public function banners(): HasMany
    {
        return $this->hasMany(Banner::class);
    }

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }
}
