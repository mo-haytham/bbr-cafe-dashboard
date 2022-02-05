@if (Session::has('customError'))
    <div class="alert alert-danger text-center">
        <small>{{ Session::get('customError') }}</small>
    </div>
@endif

@if (Session::has('customSuccess'))
    <div class="alert alert-success text-center">
        <small>{{ Session::get('customSuccess') }}</small>
    </div>
@endif
