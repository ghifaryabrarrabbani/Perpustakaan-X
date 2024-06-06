<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class requestbook extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $table = 'requestbook';

    protected $fillable = [
        'id',
        'username',
        'judul_buku',
        'cover',
        'slug',
        'penulis',
        'kategori',
        'penerbit',
        'tahun_buku',
        'edisi_buku',
        'Status'
        
    ];
    protected $attributes = [
        'Status' => 'NO'
    ];
    public function sluggable():array{
        return [
            'slug' => [
                'source' => ['id']
            ]
            ];
    }
}