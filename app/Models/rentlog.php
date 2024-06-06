<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rentlog extends Model
{
    use HasFactory;

    protected $table = 'table_sewa_buku';

    protected $fillable = [
        'id_pustaka', 'id_user', 'tanggal_sewa', 'tanggal_kembali'
    ];
    public $timestamps = false;

    // Model Rentlog.php
public function book()
{
    return $this->belongsTo(Book::class, 'id_pustaka', 'id');
}

public function user()
{
    return $this->belongsTo(User::class, 'id_user');
}

}
