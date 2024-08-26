<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    public  $fillable = ['body','post_id', 'user_id'];
    public function post() {
        return $this->belongsTo(Post::class);
    }
    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function beansComment() {
        return $this->belongsToMany(User::class, 'beans_comment');
    }
    public function beans_comment_true(User $user)  {
        return $this->beansComment()->where('user_id' ,$user->id)->exists();
    }
    public function beansComment_number(comment $comment)  {
        return $this->beansComment()->where('comment_id' ,$comment->id)->get()->count();
    }
}
