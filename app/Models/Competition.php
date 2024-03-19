<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Competition extends Model
{
    use HasFactory;

    public function submission(): HasMany
    {
        return $this->hasMany(Submission::class);
    }

    public function grading_criteria(): HasMany
    {
        return $this->hasMany(GradingCriteria::class);
    }
}
