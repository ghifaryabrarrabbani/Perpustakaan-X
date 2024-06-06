<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dimuser extends Model
{
    use HasFactory;

    protected $table = 'dim_user';

    public function user2(): BelongsTo
    {
        return $this->belongsTo(fact::class, 'sk_user');
    }
    }
    
