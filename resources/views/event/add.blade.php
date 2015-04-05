@extends('layout')

@section('sidebar')
<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li>{!!link_to_route('events', 'Show events')!!}</li>
    </ul>
</div>
@stop

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Add event</h1>
    @include('message')
    {!! Form::open(['route' => 'events.create', 'role' => 'form']) !!}
        @include('forms.event')
    {!! Form::close() !!}
</div>
@stop