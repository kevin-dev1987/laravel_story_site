@extends('layouts.default')

@section('content')
    @php
        // dd($story);
    @endphp
    <div class="view-story-wrapper">
        <div class="view-header">
            <h2>{{ $story->title }}</h2>
            <i>"This is where the tagline for the story will go."</i>
            <div class="story-stats">
                <div class="stat">
                    <i class="bi bi-eye-fill"></i>
                    000
                </div>
                <div class="stat">
                    <i class="bi bi-star-fill"></i>
                    {{ round($story->rating_avg_rating) }}/10({{ $story->rating_count }})
                </div>
                <div class="stat">
                    <i class="bi bi-hand-thumbs-up-fill"></i>
                    {{ $story->likes_count }}
                </div>
                <div class="stat">
                    <i class="bi bi-chat-fill"></i>
                    0000
                </div>
                <div class="stat">
                    <i class="bi bi-book-fill"></i>
                    {{ str_word_count($story->body) }} words
                </div>
            </div>
        </div>
        <div class="interact-wrapper">
            <div class="author-interact">
                <div class="info">
                    <div class="image">
                        <a href="#">
                            <img src="{{ $story->author->avatar }}" alt="{{ $story->author->username }}">
                        </a>
                    </div>
                    <div class="username">
                        <span>Written By</span>
                        <a href="#">{{ $story->author->username }}</a>
                    </div>
                </div>
                <div class="interaction">
                    @if (in_array($story->author->id, $user_follow_check))
                        <button class="btn btn-interact story-author-follow-btn" disabled>
                            <i class="bi bi-plus"></i>Follow
                        </button>
                    @else
                        <button class="btn btn-interact story-author-follow-btn" data-author_id="{{ $story->author->id }}">
                            <i class="bi bi-plus"></i>Follow
                        </button>
                    @endif

                    @if (in_array($story->author->id, $user_kudos_check))
                        <button class="btn btn-interact story-author-kudos-btn" disabled>
                            <i class="bi bi-heart-fill"></i>Send Kudos
                        </button>
                    @else
                        <button class="btn btn-interact story-author-kudos-btn" data-author_id="{{ $story->author->id }}">
                            <i class="bi bi-heart"></i>Send Kudos
                        </button>
                    @endif
                </div>
            </div>
            <div class="story-interact">
                @if (in_array($story->id, $story_like_check))
                    <button class="btn btn-interact story-like-btn" disabled>
                        <i class="bi bi-hand-thumbs-up-fill"></i>Like
                    </button>
                @else
                    <button class="btn btn-interact story-like-btn" data-story_id="{{ $story->id }}">
                        <i class="bi bi-hand-thumbs-up"></i>Like
                    </button>
                @endif
                @if (in_array($story->id, $story_fav_check))
                    <button class="btn btn-interact story-favourite-btn" disabled>
                        <i class="bi bi-star-fill"></i>Favourite
                    </button>
                @else
                    <button class="btn btn-interact story-favourite-btn" data-story_id="{{ $story->id }}">
                        <i class="bi bi-star"></i>Favourite
                    </button>
                @endif
                <button class="btn btn-interact report-story-modal-open" data-story_id="{{$story->id}}">
                    <i style="color: rgb(190, 1, 1);" class="bi bi-flag-fill"></i>
                </button>

            </div>
        </div>
        <div class="report-story-modal">
            <div class="modal-content">
                <p>Why are you reporting this story?</p>
                <div class="report-modal-errors">
                    
                </div>
                <form id="story_report_form">
                    <ul>
                        <li>
                            <input type="radio" name="reason" id="report-radio-1" value="Reason 1">
                            <label for="report-radio-1">Reason 1</label>
                        </li>
                        <li>
                            <input type="radio" name="reason" id="report-radio-2" value="Reason 2">
                            <label for="report-radio-2">Reason 2</label>
                        </li>
                        <li>
                            <input type="radio" name="reason" id="report-radio-3" value="Reason 3">
                            <label for="report-radio-3">Reason 3</label>
                        </li>
                    </ul>
                    <input type="hidden" name="story_id" value="" id="story-report-id">
                    <button class="btn btn-primary submit-story-report">Report</button>
                    <button class="btn btn-danger cancel-story-report">Cancel</button>
                </form>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="content-body">
                {{ $story->body }}
            </div>
        </div>
        <div class="comments-wrapper">
            <h3>Comments</h3>
            <div class="comment-submit-block">
                <div class="input">
                    <textarea name="comment" id="comments-textarea"></textarea>
                    <div class="input-lower">
                        <div class="character-count">
                            <span>0</span>/300 characters.
                        </div>
                        <div class="add-to">
                            <div class="emojis">
                                <i class="bi bi-emoji-smile"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit">
                    <button class="btn-large btn-primary">Submit</button>
                </div>
            </div>
            <div class="comment-list-block">
                <div class="stat-bar">
                    <span><i class="bi bi-chat-fill"></i> {{$story->comments_count}}</span>
                    <span>Posting as Username</span>
                </div>
                <div class="comment-list-main">
                    @foreach ($story->comments as $comment)
                        <x-story-comment :comment="$comment" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
