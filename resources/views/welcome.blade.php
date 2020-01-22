@extends('layouts.common')

@section('pageCss')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')
    <div class="main-image">
        <h2 class="main-image__image"><img src="{{ asset('img/main_image.jpg') }}" alt="メインイメージ"></h2>
        <p>BizITとは？<br>
        <span>テキストが入りますLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</span></p>
    </div><!-- /main_image -->

    <div class="container">
        <div class="site-description">
            <ul>
                <li>
                    <i class=""></i>
                    <span>ビジネス、ITのイシューを投稿</span>
                </li>
                <li>
                    <i class=""></i>
                    <span>投稿されたイシューをメンバーが解決</span>
                </li>
            </ul>
        </div>

        <div class="btn">
            <a class="btn-flat-border" href="#">使ってみる</a>
            <a class="btn-flat-border" href="#">メンバーになる</a>
        </div>
    </div><!-- /container -->
@endsection