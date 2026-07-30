<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'author',
        'description',
        'price',
        'type',
        'book_image',
        'pdf_file',
        'is_free'
    ];
    public function orders()
{
    return $this->hasMany(Order::class);
}

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}       