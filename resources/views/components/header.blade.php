<header class="header-top">
    <div class="header-inner">
        <h1>
            <a class="header-textLogo" href="{{ route('home') }}">BizIT</a>
        </h1>

        <nav class="header-nav">
        {{-- 未認証 --}}
        @guest
            <li class="nav-item">
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
                @endif
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
            </li>

        {{-- 認証済み --}}
        @else
            {{-- 管理画面、サイトTOP出し分け --}}
            <li class="nav-item">
                @if (!Request::is('admin*') and !Request::is('master*'))
                    <a class="nav-link" href="{{ route('admin') }}">管理画面へ</a>
                @else
                    <a class="nav-link" href="{{ route('home') }}">ホームへ</a>
                @endif
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user', ['id' => Auth::id()]) }}">ログインユーザー：{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
                <form class="nav-link"　action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="logout-button" type="submit">ログアウト</button>
                </form>
            </li>
        @endguest
        </nav>
    </div>
</header>