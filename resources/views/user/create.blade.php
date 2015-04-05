@extends('layout')

@section('sidebar')
    <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <li>{!! link_to_route('users.index', 'Users') !!}</li>
        </ul>
    </div>
@stop

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="container">
            <h1>Add user</h1>
            @include('message')
            {!! Form::open(['route' => 'users.store', 'role' => 'form']) !!}
            @include('forms.user', ['submitButtonText' => 'Create user'])
            {!! Form::close() !!}
        </div>
    </div>
@stop
