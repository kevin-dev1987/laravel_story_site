@extends('layouts.default')

@section('content')
    {{-- @php
        foreach ($categories as $category) {
            echo $category->category_name . ': ' . count(array_keys($cat_story_count, $category->category_name)) . ' stories' . '<br>'; 
        }

    @endphp --}}

    <div class="categories-wrapper">
        <div class="page-header">
            <div class="title">
                <i class="bi bi-list"></i>
                <h2>Categories</h2>
            </div>
        </div>
        <div class="categories-grid">
            @foreach ($categories as $category)
                <div class="category">
                    <a href="#">
                        <span>{{$category->category_name}}</span>
                        {{count(array_keys($cat_story_count, $category->category_name))}}
                        Stories
                    </a>
                </div>
            @endforeach
        </div>
    </div>


    


@endsection