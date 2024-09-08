<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "group",
        "cv",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function soutnance(): HasOne
    {
        return $this->hasOne(Soutnance::class);
    }

    public function stage(): HasOne
    {
        return $this->hasOne(Stage::class);
    }

    public function stagereq(): HasMany
    {
        return $this->hasMany(Stagereq::class);
    }
}
