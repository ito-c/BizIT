@extends('layouts.common')

@section('pageCss')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <div class="container s-size">
        <div class="box">
            <div class="card">
                <div class="card-header">ログイン</div>

                <div class="card-body m-size">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label class="form-label" for="email">メールアドレス</label>
                            <input class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password">パスワード</label>
                            <input class="form-input" type="password" name="password" required>
                        </div>

                        @component('components.formErrors')
                        @endcomponent

                        <div class="form-group">
                            <div class="form-check">
                                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">次回より自動ログイン</label>
                            </div>
                        </div>

                        <div class="btn-center">
                            <button class="btn-flat-border" type="submit">ログイン</button>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="forgotPassword s-size form-group" href="{{ route('password.request') }}">パスワードを忘れた方はこちら</a>
                        @endif
                        
                    </form>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <input class="form-input" type="hidden" name="email" value="test_account@test000.com">
                        <input class="form-input" type="hidden" name="password" value="test000">
                        <div class="btn-center">
                            <button class="btn-flat-border-test" type="submit">テストユーザーでログイン</button>
                        </div>
                    </form>

                </div>{{-- card-body --}}
            </div>{{-- card --}}
        </div>{{-- box --}}
    </div>{{-- container --}}
@endsection
