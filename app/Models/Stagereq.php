<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stagereq extends Model
{
    use HasFactory;


    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function stageoffer(): BelongsTo
    {
        return $this->belongsTo(Stageoffer::class);
    }

    protected $fillable = ['student_id', 'offer_id'];
}
