<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catergory extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name',
        'logo',
       

    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function add_create()
    {
        return $this->hasMany(Add_create::class);
    }


    public function subCategory()
    {
        return $this->hasMany(SubCategory::class,'maincatergory_id');
    }

    public function userPosts()
    {
        return $this->hasMany(Post::class)->where('user_id', auth()->id());
    }
}
