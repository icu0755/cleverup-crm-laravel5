@extends('layout')

@section('sidebar')
    <div class="col-md-2">
        <ul class="nav nav-sidebar">
            <li>{!! link_to_route('users.index', 'Users') !!}</li>
        </ul>
    </div>
@stop

@section('content')
    <div class="col-md-4 main">
        <h1>Add user</h1>
        @include('message')
        {!! Form::open(['route' => 'users.store', 'role' => 'form']) !!}
        @include('forms.user', ['submitButtonText' => 'Create user', 'roles' => $roles])
        {!! Form::close() !!}
    </div>
@stop
