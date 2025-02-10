<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{


    
    use HasFactory;

    
    protected $fillable = [
        
        'name',
        'maincatergory_id',
        
       

    ];
    public function post()
    {
        return $this->hasMany(Post::class,);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function add_create()
    {
        return $this->hasMany(Add_create::class);
    }
    // SubCategory.php
public function catergory()
{
    return $this->belongsTo(Catergory::class, 'maincatergory_id'); // Ensure the foreign key is correct
}

    public function userPosts()
    {
        return $this->hasMany(Post::class)->where('user_id', auth()->id());
    }
}


