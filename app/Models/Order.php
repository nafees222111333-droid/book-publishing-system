<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'book_type',
        'quantity',
        'price',
        'shipping_charge',
        'total_price',
        'status',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function payment()
{
    return $this->hasOne(Payment::class);
}
}