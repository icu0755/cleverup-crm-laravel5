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
        @yield('sidebar')
        @yield('content')

        <script src="{{asset('scripts/vendor.js')}}"></script>
        <script src="{{asset('scripts/plugins.js')}}"></script>
        <script src="{{asset('scripts/modules/config.js')}}"></script>
        <script src="{{asset('scripts/modules/calendar_controller.js')}}"></script>
        <script src="{{asset('scripts/modules/customers_controller.js')}}"></script>
        <script src="{{asset('scripts/modules/customers_edit_controller.js')}}"></script>
        <script src="{{asset('scripts/modules/customer_groups_controller.js')}}"></script>
        <script src="{{asset('scripts/modules/event_edit_controller.js')}}"></script>
        <script src="{{asset('scripts/modules/events_controller.js')}}"></script>
        <script src="{{asset('scripts/main.js')}}"></script>
    </body>
</html>