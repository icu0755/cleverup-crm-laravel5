<!doctype html>
<html class="no-js">
      <head>
        <meta charset="utf-8">
        <title>Cleverup</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="stylesheet" href="{{asset('styles/vendor.css')}}" />
        <link rel="stylesheet" href="{{asset('styles/main.css')}}" />
      </head>
    <body id="{{$body or ''}}">
        @include('navbar')
        <div class="container-fluid">
            <div class="col-sm-3 col-md-2 sidebar">
                @yield('sidebar')
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @yield('content')
            </div>
        </div>

        <script src="{{asset('scripts/vendor.js')}}"></script>
        <script src="{{asset('scripts/plugins.js')}}"></script>
        <script src="{{asset('scripts/modules/config.js')}}"></script>
        <script src="{{asset('scripts/modules/calendar_controller.js')}}"></script>
        <script src="{{asset('scripts/modules/customers_controller.js')}}"></script>
        <script src="{{asset('scripts/modules/customers_edit_controller.js')}}"></script>
        <script src="{{asset('scripts/modules/customer_groups_controller.js')}}"></script>
        <script src="{{asset('scripts/modules/event_edit_controller.js')}}"></script>
        <script src="{{asset('scripts/modules/events_controller.js')}}"></script>
        <script src="{{asset('scripts/modules/lesson_add_controller.js')}}"></script>
        <script src="{{asset('scripts/main.js')}}"></script>
    </body>
</html>