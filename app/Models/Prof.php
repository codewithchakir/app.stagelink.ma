<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prof extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "group",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function soutnances(): HasMany
    {
        return $this->hasMany(Soutnance::class);
    }
}
