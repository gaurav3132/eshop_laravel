<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshop</title>


    <link rel="stylesheet" href="{{url('public/css/cms.css')}}">

</head>

<body>
<div class="container-fluid">

    @yield('nav')

    @yield('content')
</div>

<div class="position-fixed bottom-0 start-0 py-4 px-3">
    @if($errors->any())

        @foreach($errors->all() as $error)
                <div class="toast align-items-center text-bg-danger border-0 mt-3" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{$error}}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="close"></button>
                    </div>
                </div>
        @endforeach
        @endif

    @include('flash::message')
</div>

<script src="{{url('public/js/cms.js')}}"></script>
</body>
</html>
