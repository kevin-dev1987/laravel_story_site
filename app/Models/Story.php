<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    //Relationships
    public function author(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function rating(){
        return $this->hasMany(Rating::class, 'story_id', 'id');
    }

    public function likes(){
        return $this->hasMany(Like::class, 'story_id', 'id');
    }

    public function tags(){
        return $this->hasMany(Tag::class, 'story_id', 'id');
    }

    public function category(){
        return $this->hasOne(Category::class, 'category_name', 'category');
    }




    public function scopeFilter($query, array $filter){
        if($filter['story_sort'] ?? false){
            if($filter['story_sort'] == 'newest'){
                $query->orderBy('created_at', 'desc');
            }

            if($filter['story_sort'] == 'oldest'){
                $query->orderBy('created_at', 'asc');
            }

            if($filter['story_sort'] == 'avg_rating_high'){
                $query->orderBy('rating_avg_rating', 'desc');
            }

            if($filter['story_sort'] == 'avg_rating_low'){
                $query->orderBy('rating_avg_rating', 'asc');
            }

            if($filter['story_sort'] == 'most_rated'){
                $query->withCount('rating')->orderBy('rating_count', 'desc');
            }

            if($filter['story_sort'] == 'least_rated'){
                $query->withCount('rating')->orderBy('rating_count', 'asc');
            }
        }

        if($filter['story_search'] ?? false){
            $query->where(function($q) use ($filter){
                $q->where('title', 'LIKE', "%{$filter['story_search']}%")
                ->orWhereHas('tags', function($q) use ($filter){
                    $q->where('tag', 'LIKE', "%{$filter['story_search']}%");
                });
            });
        }
    }
}
