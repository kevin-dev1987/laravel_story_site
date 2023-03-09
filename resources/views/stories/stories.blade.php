@extends('layouts.default')

@section('content')
@php
    // dd($stories)
@endphp
    <div class="stories-wrapper">
        <div class="page-header">
            <div class="title">
                <i class="bi bi-book-fill"></i>
                <h2>Stories</h2>
            </div>
            <div class="search-form">
                <form action="/stories" method="get">
                    <input type="search" name="story_search" id="story_search" placeholder="Search titles, tags">
                    <button class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
        <div class="header-bar">
            <div class="sort-links">
                <ul>
                    <a href="{{route('stories', ['story_sort' => 'newest', 'story_search' => request('story_search')])}}">Newest</a>
                    <a href="{{route('stories', ['story_sort' => 'oldest', 'story_search' => request('story_search')])}}">Oldest</a>
                    <a href="{{route('stories', ['story_sort' => 'most_views', 'story_search' => request('story_search')])}}">Most Views</a>
                    <a href="{{route('stories', ['story_sort' => 'least_views', 'story_search' => request('story_search')])}}">Least Views</a>
                    <a href="{{route('stories', ['story_sort' => 'avg_rating_high', 'story_search' => request('story_search')])}}">Avg Rating (High)</a>
                    <a href="{{route('stories', ['story_sort' => 'avg_rating_low', 'story_search' => request('story_search')])}}">Avg Rating (Low)</a>
                    <a href="{{route('stories', ['story_sort' => 'most_rated', 'story_search' => request('story_search')])}}">Most Rated</a>
                    <a href="{{route('stories', ['story_sort' => 'least_rated', 'story_search' => request('story_search')])}}">Least Rated</a>
                </ul>
            </div>
            <div class="story-count">
                Stories: {{$stories_count}}
            </div>
        </div>
        <div class="stories-grid">
            <div class="page-links">
                {{$stories->links()}}
            </div>
            <div class="grid-content">
                @foreach ($stories as $story)
                    <x-story-card :story="$story"/>
                @endforeach
            </div>
            <div class="page-links">
                {{$stories->links()}}
            </div>
        </div>
    </div>
@endsection