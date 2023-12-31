<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_title',
        'meta_description',
        'keywords',
        'image_big',
        'image_thumb',
        'slug',
        'body',
    ];
}
