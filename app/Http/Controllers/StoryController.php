<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Category;
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
        $story = $story->load(['rating', 'author', 'tags'])->loadCount('rating')->loadAvg('rating', 'rating');

        return view('stories.view_story', ['story' => $story]);
    }
}
