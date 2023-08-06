<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if (Session::has('alert-'.$msg))
            <p class="alert alert-{{$msg}} alert-block">
                <strong>{{Session::get('alert-'.$msg)}}</strong>
            </p>
        @endif
    @endforeach
</div>