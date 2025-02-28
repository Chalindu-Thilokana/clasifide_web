<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iphone extends Model
{
    use HasFactory;

    
    protected $fillable = [
        
        'topic',
        'description',
        'phone',
        'image',
        'category',
        'location',

        'price',
        'user_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
