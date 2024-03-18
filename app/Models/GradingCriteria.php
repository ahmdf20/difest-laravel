<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GradingCriteria extends Model
{
    use HasFactory;

    public function submission_grading(): HasMany
    {
        return $this->hasMany(SubmissionGrading::class);
    }
}
