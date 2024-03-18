<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Submission extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function submission_grading(): HasMany
    {
        return $this->hasMany(SubmissionGrading::class);
    }

    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }
}
