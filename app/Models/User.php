<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Validator;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'bio',
        'privavte_account',
        'image',
        'email',
        'password',
        'lang',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function toggle_follow(User $user)  {
        $this->following()->toggle($user);
        if(! $user->privavte_account) {
            return $this->following()->updateExistingPivot($user, ['confirmed' => true]);
        }
    }
    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function comments() {
        return $this->hasMany(comment::class);
    }

    public static function suggested_users() {
        $following = auth()->user()->following()->wherePivot('confirmed', true)->get();
        return User::all()->diff($following)->except(auth()->id())->shuffle()->take(5);
    }

    public function beans() {
    return $this->belongsToMany(Post::class, 'beans');
    }
    public function beansComment() {
    return $this->belongsToMany(comment::class, 'beans_comment');
    }

    public function following() {
    return $this->belongsToMany(User::class, 'follows', 'user_id','following_user_id')->withTimestamps()->withPivot('confirmed');
    }

    public function followers() {
    return $this->belongsToMany(User::class, 'follows', 'following_user_id','user_id')->withTimestamps()->withPivot('confirmed');
    }

    public function follow(User $user) {
        if($user->privavte_account) {
            return $this->following()->attach($user);
        }
        return $this->following()->attach($user, ['confirmed' => true]);
    }

    public function unfollow(User $user) {
    return $this->following()->detach($user);
    }

    public function is_panding(User $user) {
        return $this->following()->where('following_user_id',$user->id)->where('confirmed',false)->exists();
    }

    public function is_follower(User $user) {
        return $this->followers()->where('user_id',$user->id)->where('confirmed', true)->exists();
    }

    public function is_following(User $user) {
        return $this->following()->where('following_user_id',$user->id)->where('confirmed',true)->exists();
    }

    public function pending_followers() {
        return $this->followers()->where('confirmed', false)->get();
    }

    public function confirm(User $user) {
        return $this->followers()->updateExistingPivot($user, ['confirmed' => true]);
    }

    public function deleteFollower(User $user) {
        return $this->followers()->detach($user);
    }

    public function image_profile($show_image) {
        if(strpos($show_image,'ui-avatars.com') > 0) {
            return $show_image;
        }
        return asset('storage/'.$show_image);
    }
}
