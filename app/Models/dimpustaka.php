<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dimpustaka extends Model
{
    use HasFactory;

    protected $table = 'dim_pustaka';

    public function pustaka2(): BelongsTo
    {
        return $this->belongsTo(fact::class, 'sk_pustaka', 'sk_pustaka');
    }
}

