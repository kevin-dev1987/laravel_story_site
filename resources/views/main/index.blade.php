@extends('layouts.default')

@section('content')
    @include('includes.hero')

    <div class="index-wrapper">
        <div class="category-box-flex">
            <div class="box">
                <a href="#">
                    <div class="image">
                        <img src="https://picsum.photos/150/190" alt="Category Name">
                    </div>
                    <h4>Category Title</h4>
                </a>
            </div>
            <div class="box">
                <a href="#">
                    <div class="image">
                        <img src="https://picsum.photos/150/190" alt="Category Name">
                    </div>
                    <h4>Category Title</h4>
                </a>
            </div>
            <div class="box">
                <a href="#">
                    <div class="image">
                        <img src="https://picsum.photos/150/190" alt="Category Name">
                    </div>
                    <h4>Category Title</h4>
                </a>
            </div>
            <div class="box">
                <a href="#">
                    <div class="image">
                        <img src="https://picsum.photos/150/190" alt="Category Name">
                    </div>
                    <h4>Category Title</h4>
                </a>
            </div>
            <div class="box">
                <a href="#">
                    <div class="image">
                        <img src="https://picsum.photos/150/190" alt="Category Name">
                    </div>
                    <h4>Category Title</h4>
                </a>
            </div>
        </div>
        <div class="genre-dropdown-wrapper">
            <div class="head">
                <strong>Browse Genres</strong>
                <a class="expand-genre-menu" id="expand-genre-menu" href="javascript:void(0)">View all <i
                        class="bi bi-caret-down-fill"></i><i class="bi bi-caret-left-fill"></i></a>
            </div>
            <div class="menu">
                <ul>
                    @foreach ($categories as $cat)
                        <a href="#">{{ $cat->category_name }}</a>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="most-rated-stories">
            <div class="section-header">
                <i class="bi bi-star-fill"></i>
                <h3>Most Rated Stories</h3>
                <a href="#">View All</a>
            </div>
            <div class="list-flex">
                @foreach ($stories as $story)
                    <x-story-card :story="$story" />
                @endforeach
            </div>
        </div>
        <div class="section-flex">
            <div class="new-stories">
                <div class="section-header">
                    <i class="bi bi-person-fill"></i>
                    <h3>New Stories</h3>
                    <a href="#">View All</a>
                </div>
                <ul>
                    @foreach ($new_stories as $story)
                        @if (strlen($story->title) > 90)
                            <a href="#"> {{substr($story->title, 0, 85) . '...'}} </a>
                        @else
                            <a href="#"> {{ $story->title }} </a>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="popular-authors">
                <div class="section-header">
                    <i class="bi bi-person-fill"></i>
                    <h3>Popular Authors</h3>
                    <a href="#">View All</a>
                </div>
                <ul>
                    @foreach ($popular_users as $user)
                        <x-user-card :user="$user" />
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
