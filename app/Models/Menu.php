<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'menus';

    protected $casts = [
        'subject' => 'array'
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    // public function parent()
    // {
    //     return $this->belongsTo(self::class, 'parent_id');
    // }

    // public function children()
    // {
    //     return self::where('parent_id', $this->id)->get();
    // }
}
