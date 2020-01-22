@extends('layouts.common')

@section('pageCss')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <div class="container s-size">
        <div class="box">
            <div class="card">
                <div class="card-header">新規登録</div>

                <div class="card-body m-size">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label class="form-label" for="name">名前</label>
                            <input class="form-input" type="text" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">メールアドレス</label>
                            <input class="form-input" type="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password">パスワード</label>
                            <input class="form-input" type="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password-confirm">パスワード確認</label>
                            <input class="form-input" type="password" name="password_confirmation" required>
                        </div>

                        @component('components.formErrors')
                        @endcomponent

                        <button class="btn-flat-border" type="submit">登録する</button>

                    </form>
                </div>{{-- card-body --}}
            </div>{{-- card --}}
        </div>{{-- box --}}
    </div>{{-- container --}}
@endsection
