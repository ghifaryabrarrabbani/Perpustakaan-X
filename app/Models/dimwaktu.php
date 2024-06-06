<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dimwaktu extends Model
{
    use HasFactory;

    protected $table = 'dim_waktu';
    public function waktupinjam(): BelongsTo
    {
        return $this->belongsTo(fact::class, 'sk_waktu', 'sk_kembali');
    }
        public function waktukembali(): BelongsTo
    {
        return $this->belongsTo(fact::class, 'sk_waktu', 'sk_kembali');
    }
}

