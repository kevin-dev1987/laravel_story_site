<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Kudos;
use App\Models\Story;
use App\Models\Follow;
use App\Models\Category;
use App\Models\Favourite;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function stories(){
        $stories = Story::filter(request(['story_sort', 'story_search']))->with(['author', 'tags' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->withAvg('rating', 'rating')->orderBy('created_at', 'desc')->paginate(25);
        $stories_count = Story::count();
        $stories->appends(request()->only(['story_sort', 'story_search']));

        return view('stories.stories', ['stories' => $stories, 'stories_count' => $stories_count]);
    }

    public function categories(){
        $categories = Category::get();
        $cat_story_count = Story::pluck('category')->toArray();

        return view('stories.categories', ['categories' => $categories, 'cat_story_count' => $cat_story_count]);
    }

    public function getStory(Story $story){
        $story = $story->load(['rating', 'author', 'tags'])->loadCount(['rating', 'likes'])->loadAvg('rating', 'rating');
        $user_follow_check = Follow::where('follow_from', 777)->pluck('follow_to')->toArray();
        $user_kudos_check = Kudos::where('kudos_from', 777)->pluck('kudos_to')->toArray();
        $story_like_check = Like::where('user_id', 777)->pluck('story_id')->toArray();
        $story_fav_check = Favourite::where('user_id', 777)->pluck('story_id')->toArray();

        return view('stories.view_story', [
            'story' => $story, 
            'user_follow_check' => $user_follow_check, 
            'user_kudos_check' => $user_kudos_check, 
            'story_like_check' => $story_like_check,
            'story_fav_check' => $story_fav_check,
        ]);
    }
}
