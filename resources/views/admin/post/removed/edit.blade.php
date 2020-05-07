@extends('layouts.adminCommon')

@section('content')
    <div class="container">
        <div class="contents">
            <div class="isolation m-size">
                <p>イシュー詳細（ごみ箱）</p>
                    <form method="POST" action="{{ route('forceDelete', $post->id) }}">
                        @csrf

                        <div class="form-group">
                            <label class="form-label" for="title">タイトル</label>
                            <input class="form-input" type="text" name="title" value="{{ $post->title }}"  readonly>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="description">詳細</label>
                            <input class="form-input" type="text" name="description" value="{{ $post->description }}" readonly>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="category_id">カテゴリー</label>
                            <select class="form-select" name="category_id">
                                <option disabled selected>選択してください</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category->id == $category->id ? 'selected' : '' }} disabled>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button class="submit" type="submit">削除する</button>
                        </div>
                    </form>

                @component('components.formErrors')
                @endcomponent
                
            </div>
        </div>
    </div>
    
@endsection