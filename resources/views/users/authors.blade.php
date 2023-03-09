@extends('layouts.default')

@section('content')
    <div class="authors-wrapper">
        <div class="page-header">
            <div class="title">
                <i class="bi bi-person-fill"></i>
                <h2>Authors</h2>
            </div>
            <div class="search-form">
                <form action="/authors" method="get">
                    <input type="search" name="user_search" id="user_search" placeholder="Search users, authors">
                    <button class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
        <div class="header-bar">
            <div class="sort-links">
                <ul>
                    <a
                        href="{{ route('authors', ['user_sort' => 'a_z', 'user_search' => request('user_search')]) }}">A-Z</a>
                    <a
                        href="{{ route('authors', ['user_sort' => 'z_a', 'user_search' => request('user_search')]) }}">Z-A</a>
                    <a
                        href="{{ route('authors', ['user_sort' => 'most_stories', 'user_search' => request('user_search')]) }}">Most
                        Stories</a>
                    <a
                        href="{{ route('authors', ['user_sort' => 'most_followers', 'user_search' => request('user_search')]) }}">Most
                        Followers</a>
                    <a href="{{ route('authors', ['user_sort' => 'most_likes', 'user' => request('user_search')]) }}">Most
                        Likes</a>
                    <a href="{{ route('authors', ['user_sort' => 'online', 'user' => request('user_search')]) }}">Online
                        Now</a>
                </ul>
            </div>
            <div class="story-count">
                Members: {{ $user_count }}
            </div>
        </div>
        <div class="page-links">
            {{ $authors->withQueryString()->links() }}
        </div>
        <div class="categories-grid">
            @unless($authors->count() == 0)
                @foreach ($authors as $user)
                    <x-user-card :user="$user" />
                @endforeach
            @else
                <div class="user-not-found">
                    User not found!
                </div>
            @endunless
        </div>
        <div class="page-links">
            {{ $authors->withQueryString()->links() }}
        </div>
    </div>
@endsection
