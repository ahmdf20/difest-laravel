<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmissionGrading extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function grading_criteria(): BelongsTo
    {
        return $this->belongsTo(GradingCriteria::class);
    }

    public function submission(): BelongsTo
    {
        return $this->belongsTo(Submission::class);
    }
}
