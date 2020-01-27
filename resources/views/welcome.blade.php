@extends('layouts.common')

@section('pageCss')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')
    <div class="main-image">
        <h2 class="main-image__image"><img src="{{ asset('img/main_image.jpg') }}" alt="メインイメージ"></h2>
        <p class="first-sentence">BizIT</p>
        <p class="second-sentence">「ITやデジタルは難しい。誰に聞けば…。」<br>「この技術は面白そう。でもビジネスのことはよくわからない。<br>チャンスなのに…。」</p>
        <p class="third-sentence">BizITは、そんなビジネスやITの困りごとについて、気軽に相談や質問ができるWeb掲示板サービスです。<br>ビジネスとITの経営課題解決に向けて、身近なところから。</p>
    </div><!-- /main_image -->

    <div class="container">
        <div class="site-description">
            <ul>
                <li>
                    <i class="fas fa-laptop fa-4x"></i>
                    <span>ビジネスやITに関するイシューを投稿</span>
                </li>
                <li>
                    <i class="fas fa-user-edit fa-4x"></i>
                    <span>投稿されたイシューをメンバーが解決</span>
                </li>
                <li>
                    <i class="far fa-handshake fa-4x"></i>
                    <span>皆で助け合いましょう</span>
                </li>
            </ul>
        </div>
        <div class="btn">
            {{-- <a class="btn-flat-border" href="#">使ってみる</a> --}}
            <a class="btn-flat-border" href="{{ route('register') }}">メンバーになる</a>
        </div>
    </div><!-- /container -->
@endsection