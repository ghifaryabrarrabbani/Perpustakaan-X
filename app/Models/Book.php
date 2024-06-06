<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $table = 'pustaka';

    protected $fillable = [
        'id',
        'judul_buku',
        'cover',
        'slug',
        'penulis',
        'penerbit',
        'tahun_buku',
        'edisi_buku',
        'stocks',
        'id_kategori'
    ];

    public function sluggable():array{
        return [
            'slug' => [
                'source' => 'judul_buku'
            ]
            ];
    }

/**
 * Get the category that belongs to the book.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function category(): BelongsTo
{
    return $this->belongsTo(Category::class, 'id_kategori', 'id');
}



}
