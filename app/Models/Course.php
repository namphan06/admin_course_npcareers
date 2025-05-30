<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'youtube_link', 'price',
        'thumbnail', 'is_active', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
