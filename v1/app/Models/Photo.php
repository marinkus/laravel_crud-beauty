<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'url'];

    public function getPosts()
    {
    return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
