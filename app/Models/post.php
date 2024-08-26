<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    public $fillable = ['description','slug', 'user_id','file','file_type'];
    public function owner() {
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments() {
        return $this->hasMany(comment::class);
    }
    public function beans() {
        return $this->belongsToMany(User::class, 'beans');
    }
    public function bean_true(User $user)  {
        return $this->beans()->where('user_id' ,$user->id)->exists();
    }
    public function post_image($image) {
        return asset('storage/'. $image);
    }
    public function files() {
        return  (array) json_decode($this->file);
    }
}
