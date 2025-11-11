<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    public function user() {
        return $this->hasOne(User::class, 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
    
}
