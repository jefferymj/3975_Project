<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'user_id',
        'species',
        'genus',
        'family',
        'common_names',
    ];

    protected $casts = [
        'common_names' => 'array', // Cast the common_names attribute to an array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
