<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    use HasFactory;

    public function image()
    {
        return $this->hasOne(Image::class);
    }
    
    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }
}
