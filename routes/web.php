<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\KudosController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\FavouriteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('home');


//Stories
Route::get('/stories', [StoryController::class, 'stories'])->name('stories');

Route::get('/stories/{story}', [StoryController::class, 'getStory'])->name('view_story');

//Categories
Route::get('/categories', [StoryController::class, 'categories'])->name('categories');

//Users - non auth
Route::get('/authors', [PageController::class, 'authors'])->name('authors');

//User Interaction

Route::post('/follow_user', [FollowController::class, 'followUser'])->name('follow_user');

Route::post('/kudos_user', [KudosController::class, 'kudosUser'])->name('kudos_user');


//Story Interaction

Route::post('/like_story', [LikesController::class, 'likeStory'])->name('like_story');

Route::post('/favourite_story', [FavouriteController::class, 'favouriteStory'])->name('favourite_story');