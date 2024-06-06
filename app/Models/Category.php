<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $table = 'kategori';
    protected $fillable = [
        'id',
        'category',
        'slug'
    ];
    public $timestamps = false;

    public function sluggable():array{
        return [
            'slug' => [
                'source' => 'category'
            ]
            ];
    }
    public function books()
    {
        return $this->hasMany(Book::class); // Menyatakan bahwa 'Category' memiliki banyak 'Book'
    }
    
    }

