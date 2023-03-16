<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function userComment(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function CommentLikes(){
        return $this->hasMany(CommentLike::class, 'comment_id', 'id');
    }
}
