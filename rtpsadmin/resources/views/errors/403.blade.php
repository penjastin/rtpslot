<head>
<link href="{{ asset('assets/css/403.css') }}" rel="stylesheet">
</head>

<div class="text-wrapper">
    <img src="{{ asset('assets/img/error-image.png') }}" alt="Error Image" class=errorimg>
    <div class="title" data-content="404">
        403 - ACCESS DENIED
    </div>

    <div class="subtitle">
        You don't have permission to access this page.
    </div>

    <div class="buttons">
        <a class="button" href="{{ url()->previous() }}">Go back</a>
    </div>
</div>