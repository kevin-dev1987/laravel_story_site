
<div class="story-card">
    <div class="card-head">
        <div class="user-info">
            <div class="image">
                <img src="{{ $story->author->avatar }}" alt="{{ $story->author->username }}">
            </div>
            <a href="#">{{ $story->author->username }}</a>
        </div>
        <div class="created">
            {{ $story->created_at->diffForHumans() }}
        </div>
    </div>
    <div class="card-body">
        <a href="{{ route('view_story', $story->id)}}">{{$story->title}}</a>
        <span>This is where a tagling for the story will go.</span>
        <p>
            {{ $story->description }}
        </p>
    </div>
    <div class="card-footer">
        <div class="tags">
            <ul>
                @foreach ($story->tags as $tag)
                    <a href="#">{{$tag->tag}}</a>
                @endforeach
            </ul>
        </div>
        <div class="stats">
            <div class="progress">
                <div class="data">
                    <i class="bi bi-eye-fill"></i>
                    00000
                </div>
                <div class="data">
                    <i class="bi bi-star-fill"></i>
                    {{round($story->rating_avg_rating)}}/10
                </div>
                <div class="data">
                    <i class="bi bi-heart-fill"></i>
                    000
                </div>
                <div class="data">
                    <i class="bi bi-file-earmark-break-fill"></i>
                    00000 words
                </div>
            </div>
            <div class="genre">
                <a href="#">{{ $story->category }}</a>
            </div>
        </div>
    </div>
</div>
