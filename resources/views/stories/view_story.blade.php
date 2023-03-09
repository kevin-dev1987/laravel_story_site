@extends('layouts.default')

@section('content')
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
        <div class="view-story-interact">
            <div class="author-interact">
                <div class="info">
                    <div class="image">
                        <a href="#">
                            <img src="{{$story->author->avatar}}" alt="{{$story->author->username}}">
                        </a>
                    </div>
                    <a href="#">{{$story->author->username}}</a>
                </div>
                <div class="interaction">
                    <button class="btn btn-success" data-follow_id="{{$story->author->id}}">
                        <i class="bi bi-plus"></i>
                        Friend
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection