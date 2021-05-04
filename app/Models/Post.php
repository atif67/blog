<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    public function post_tag()
    {
        return $this->hasMany(PostTag::class,'post_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }
}
