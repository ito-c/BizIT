<div class="sidebar"><!-- float:right -->
    <div class="search">
        <div class="sidebar_title l-size">イシューを検索</div>
        <form class="search-item" action="{{ route('search') }}" method="GET">
            @csrf
            <input class="form-input" type="text" name="word" placeholder="検索したい単語を入力してください">
            <button class="submit" type="submit">送信する</button>
        </form>
    </div>
    <div class="category">
        <div class="sidebar_title l-size">カテゴリー</div>
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
        <div class="sidebar_title l-size">人気のイシュー</div>
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