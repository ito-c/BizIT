@if (!$errors->isEmpty())
    <div class="alerts">
        <div class="alert-message">
            ▼修正箇所があります
        </div>
        @foreach ($errors->all() as $error)
            <div class="alert-group" role="alert">
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif