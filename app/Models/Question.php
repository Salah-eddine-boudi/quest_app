<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'rubric_id',
        'user_id'
    ];

    /**
     * Get the rubric that owns the question.
     *
     * @return BelongsTo
     */
    public function rubric(): BelongsTo
    {
        return $this->belongsTo(Rubric::class);
    }

    /**
     * Get the user that owns the question.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the answers for the question.
     *
     * @return HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Scope a query to only include questions from a specific rubric.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $rubricId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFromRubric($query, $rubricId)
    {
        return $query->where('rubric_id', $rubricId);
    }

    /**
     * Determine if the question has any answers.
     *
     * @return bool
     */
    public function hasAnswers(): bool
    {
        return $this->answers()->exists();
    }
}
