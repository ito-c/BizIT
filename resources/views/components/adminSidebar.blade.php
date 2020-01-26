<div class="sidebar">
    <nav class="menu-lists">
        <p class="m-size">MENU</p>
        <ul>
            <li><a class="menu-list" href="{{ route('admin') }}">管理画面TOP</a></li>
            <li><a class="menu-list" href="{{ route('post.create') }}">新規イシュー投稿</a></li>
            <li><a class="menu-list" href="{{ route('post.index') }}">投稿一覧</a></li>
            <li><a class="menu-list sublist" href="{{ route('removed.index') }}">ごみ箱</a></li>
            <li><a class="menu-list" href="{{ route('adminLike') }}"><i class="far fa-thumbs-up"></i> Like!</a></li>
            <li><a class="menu-list" href="{{ route('profile.index') }}">プロフィール</a></li>
            <li><a class="menu-list" href="{{ route('category_request.create') }}">新規カテゴリー申請</a></li>
        </ul>
        @if(Auth::user()->is_master())
            <p class="m-size">サイト管理者用</p>
            <ul>
                <li><a class="menu-list" href="{{ route('master_post.index') }}">全投稿一覧</a></li>
                <li><a class="menu-list" href="{{ route('master_user.index') }}">全ユーザー一覧</a></li>
                <li><a class="menu-list" href="{{ route('master_category_request.index') }}">カテゴリー申請一覧</a></li>
            </ul>
        @endif
    </nav>
</div>