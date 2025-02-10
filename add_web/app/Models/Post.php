<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'topic',
        'description',
        'phone',
        'image',
        'image2',
        'image3',
        'catergory_id',
        'location',

        'price',
        'user_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function catergory()
    {
        return $this->belongsTo(Catergory::class);
    }
    
  // Post.php
public function subCategory()
{
    return $this->belongsTo(SubCategory::class, 'catergory_id'); // Ensure the foreign key is correct
}

    
  
}
