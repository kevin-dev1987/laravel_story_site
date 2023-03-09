<div class="navigation">
    <nav>
        <a href=" {{ route('home') }} ">Home</a>
        <a href=" {{ route('stories') }} ">Stories</a>
        <a href="{{route('stories', ['story_sort' => 'avg_rating_high'])}}">Popular Stories</a>
        <a href="{{ route('categories') }}">Categories</a>
        <a href="{{ route('authors') }}">Authors</a>
        <a href="#">Submit A Story</a>
    </nav>
    <div class="social-icons">
        <a href="#"><i class="bi bi-twitter" title="Twitter"></i></a>
        <a href="#"><i class="bi bi-facebook" title="Facebook"></i></a>
        <a href="#"><i class="bi bi-youtube" title="YouTube"></i></a>
        <a href="#"><i class="bi bi-at" title="Contact Us"></i></a>
    </div>
</div>