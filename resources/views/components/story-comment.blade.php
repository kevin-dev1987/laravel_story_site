<div class="comment">
    <div class="comment-header">
        <div class="user-info">
            <a href="#">
                <img src="{{$comment->userComment->avatar}}" alt="">
            </a>
            <a href="#">
                {{$comment->userComment->username}}
            </a>
        </div>
        <div class="comment-date">
            Posted: {{$comment->created_at->diffForHumans()}}
        </div>
    </div>
    <div class="comment-body">
        {{$comment->comment_body}}
    </div>
    <div class="comment-footer">
        @if ($comment->userComment->id != 777)
            <a href="#">Edit</a>
            <a href="#">Delete</a>
        @endif
        <div class="footer-item">
            <i class="bi bi-hand-thumbs-up-fill comment-like-btn" title="Like Comment" data-comment_id="{{$comment->id}}"></i>
            <span>{{$comment->comment_likes_count}}</span>
        </div>
        <div class="footer-item">
            <i class="bi bi-flag-fill" title="Report Comment"></i>
        </div>
    </div>
</div>