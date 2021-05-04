<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsTo(Post::class,'post_id','id');
    }

    public function tags()
    {
        return $this->belongsTo(Tag::class,'tag_id','id');
    }
}
