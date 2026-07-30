<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        
        'title',
        'type',
        'topic',
        'prize',
        'start_date',
        'end_date',
        'description'
    ];
    public function submissions()
{
    return $this->hasMany(\App\Models\Submission::class);
}
}