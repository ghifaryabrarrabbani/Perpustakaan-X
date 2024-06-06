<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class fact extends Model
{
    use HasFactory;

    protected $table = 'fact_table';
    
    public function user2(): BelongsTo
{
    return $this->belongsTo(dimuser::class, 'sk_user', 'sk_user');
}
    public function sewa2(): BelongsTo
{
    return $this->belongsTo(dimsewa::class, 'sk_table', 'sk_table');
}
    public function pustaka2(): BelongsTo
{
    return $this->belongsTo(dimpustaka::class, 'sk_pustaka', 'sk_pustaka');
}
    public function waktupinjam(): BelongsTo
{
    return $this->belongsTo(dimwaktu::class, 'sk_pinjam', 'sk_waktu');
}
    public function waktukembali(): BelongsTo
{
    return $this->belongsTo(dimwaktu::class, 'sk_kembali', 'sk_waktu');
}
}

