@if(Session::has('flashMessageSuccess'))
    <div class="flash_alert alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('flashMessageSuccess') }}
    </div>
@endif


@if(Session::has('flashMessageAlert'))
    <div class="flash_alert alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('flashMessageAlert') }}
    </div>
@endif


@if(Session::has('flashMessageError'))
    <div class="flash_alert alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('flashMessageError') }}
    </div>
@endif

@if(Session::has('flashMessageWarning'))
    <div class="flash_alert alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('flashMessageWarning') }}
    </div>
@endif



