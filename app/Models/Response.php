<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Response extends Model
{
    protected $guarded = ['id'];

    public function answer():BelongsTo
    {
        return $this->belongsTo(Answer::class);
    }

    public function question():BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function result():BelongsTo
    {
        return $this->belongsTo(Result::class);
    }
}
