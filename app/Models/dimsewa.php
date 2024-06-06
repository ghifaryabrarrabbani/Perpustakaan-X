<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dimsewa extends Model
{
    use HasFactory;

    protected $table = 'dim_sewa';
    public function sewa2(): BelongsTo
    {
        return $this->belongsTo(fact::class, 'sk_table', 'sk_table');
    }
}