<div class="user-card">
    <div class="user-info">
        <div class="image">
            <a href="#">
                <img src="{{ $user->avatar }}" alt=" {{ $user->username }} ">
            </a>
        </div>
        <a href="#"> {{ $user->username }} </a>
    </div>
    <div class="follow-status">
        <span>You Follow Each Other</span>
    </div>
    <div class="stats">
        <div class="stat">
            <i class="bi bi-file-earmark-fill" title="Stories"></i>
            {{ $user->user_stories_count }}
        </div>
        <div class="stat">
            <i class="bi bi-heart-fill" title="Memeber's Favourite"></i>
            {{$user->likes_count}}
        </div>
    </div>
    @if ($user->is_online == 1)
        <div class="online-now-blip" title="Online Now"></div>
    @endif
</div>
