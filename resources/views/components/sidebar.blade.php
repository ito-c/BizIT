<div class="sidebar"><!-- float:right -->
    <div class="category">
        <h2 class="category-title l-size">カテゴリー</h2>
        <ul>
            @if($categories->isNotEmpty())
                @foreach ($categories as $category)
                    <li class="category-item">
                        <h3 class="m-size"><a href="{{ url('/category/'. $category->id) }}">{{ $category->name }}</a></h3>
                    </li>
                @endforeach
            @else
                <p>カテゴリーはまだありません</p>
            @endif
        </ul>
    </div>

    <div class="popular">
        <h2 class="popular-title l-size">人気のイシュー</h2>
        <ul>
            @if($popular_posts->isNotEmpty())
                @foreach($popular_posts as $popular_post)
                <li class="popular-item">
                    <div class="popular-item__count">
                        <i class="far fa-thumbs-up"></i>
                        <span class="count">{{ $popular_post->like_users_count }} Likes!</span>
                    </div>
                    <a class="s-size" href="{{ route('post', ['id' => $popular_post->id]) }}">{{ $popular_post->title }}</a>
                </li>
                @endforeach
            @else
                <p>イシューはまだありません</p>
            @endif
        </ul>
    </div>
</div>

<div class="cf">
</div>