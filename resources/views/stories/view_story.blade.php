@extends('layouts.default')

@section('content')
@php
    // dd($user_follow_check);
@endphp
    <div class="view-story-wrapper">
        <div class="view-header">
            <h2>{{$story->title}}</h2>
            <i>"This is where the tagline for the story will go."</i>
            <div class="story-stats">
                <div class="stat">
                    <i class="bi bi-eye-fill"></i>
                    000
                </div>
                <div class="stat">
                    <i class="bi bi-star-fill"></i>
                    {{round($story->rating_avg_rating)}}/10({{$story->rating_count}})
                </div>
                <div class="stat">
                    <i class="bi bi-chat-fill"></i>
                    0000
                </div>
                <div class="stat">
                    <i class="bi bi-book-fill"></i>
                    {{str_word_count($story->body)}} words
                </div>
            </div>
        </div>
        <div class="interact-wrapper">
            <div class="author-interact">
                <div class="info">
                    <div class="image">
                        <a href="#">
                            <img src="{{$story->author->avatar}}" alt="{{$story->author->username}}">
                        </a>
                    </div>
                    <div class="username">
                        <span>Written By</span>
                        <a href="#">{{$story->author->username}}</a>
                    </div>
                </div>
                <div class="interaction">
                    @if (in_array($story->author->id, $user_follow_check))
                        <button class="btn btn-interact story-author-follow-btn" disabled>
                            <i class="bi bi-plus"></i>Follow
                        </button>
                    @else 
                        <button class="btn btn-interact story-author-follow-btn" data-follow_id="{{$story->author->id}}">
                            <i class="bi bi-plus"></i>Follow
                        </button>
                    @endif
                    
                    <button class="btn btn-interact story-author-kudos-btn" data-like_id="{{$story->author->id}}">
                        <i class="bi bi-heart story-author-kudos-btn"></i>Send Kudos
                    </button>
                </div>
            </div>
            <div class="story-interact">
                <button class="btn btn-interact story-like-btn">
                    <i class="bi bi-hand-thumbs-up"></i>Like
                </button>
                <button class="btn btn-interact story-favourite-btn">
                    <i class="bi bi-star"></i>Favourite
                </button>
                <button class="btn btn-interact">
                    <i style="color: rgb(190, 1, 1);" class="bi bi-flag-fill"></i>
                </button>
    
            </div>
        </div>
        <div class="content-wrapper">
            <div class="content-body">
                {{$story->body}}
            </div>
        </div>
    </div>
@endsection