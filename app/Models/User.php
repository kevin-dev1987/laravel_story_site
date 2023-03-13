<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relationships
    public function userStories(){
        return $this->hasMany(Story::class, 'user_id', 'id');
    }

    public function likes(){
        return $this->hasMany(Like::class, 'like_to', 'id');
    }

    public function followers(){
        return $this->hasMany(Follow::class, 'follow_to', 'id');
    }

    public function scopeFilter($query, array $filter){
        if($filter['user_search'] ?? false){
            $query->where('username', 'LIKE', "%{$filter['user_search']}%");
        }

        if($filter['user_sort'] ?? false){
            if($filter['user_sort'] == 'a_z'){
                $query->orderBy('username', 'asc');
            }
            if($filter['user_sort'] == 'z_a'){
                $query->orderBy('username', 'desc');
            }
            if($filter['user_sort'] == 'most_stories'){
                $query->orderBy('user_stories_count', 'desc');
            }
            //most followers here >
            if($filter['user_sort'] == 'most_likes'){
                $query->orderBy('likes_count', 'desc');
            }
            if($filter['user_sort'] == 'online'){
                $query->where('is_online', 1);
            }
        }
    }
}
