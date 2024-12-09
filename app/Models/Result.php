<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Result extends Model
{
    protected $guarded = ['id'];

    public function responses():HasMany
    {
        return $this->hasMany(Response::class);
    }
}
