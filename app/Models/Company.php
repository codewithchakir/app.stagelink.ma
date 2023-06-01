<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
        "address",
        "email",
        "phone",
        "ICE",
    ];

    public function supervisors(): HasMany
    {
        return $this->hasMany(Supervisor::class);
    }
}
