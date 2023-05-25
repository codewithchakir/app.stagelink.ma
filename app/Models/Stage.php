<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Stage extends Model
{
    use HasFactory;


    public function supervisor(): HasOne
    {
        return $this->hasOne(Supervisor::class);
    }
    
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
