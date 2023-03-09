<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Story;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('main.index', [
            'stories' => Story::with(['author', 'tags'])->withAVG('rating', 'rating')->limit(6)->orderBy('rating_avg_rating', 'desc')->get(),
            'popular_users' => User::withCount(['userStories'])->limit(8)->get(),
            'new_stories' => Story::orderBy('created_at', 'desc')->limit(20)->get(),
            'categories' => Category::get(),
        ]);
    }

    public function authors(){
        $authors = User::filter(request(['user_search', 'user_sort']))->withCount(['userStories', 'likes'])->paginate(100);
        $user_count = User::count();

        return view('users.authors', ['authors' => $authors, 'user_count' => $user_count]);
    }
}
