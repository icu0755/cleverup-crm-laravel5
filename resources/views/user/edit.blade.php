@extends('layout')

@section('sidebar')
    <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <li>{!! link_to_route('users.index', 'Users') !!}</li>
            <li>{!! link_to_route('users.create', 'Add user') !!}</li>
        </ul>
    </div>
@stop

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="container">
            <h1>Edit user: {{$user->name}}</h1>
            @include('message')
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'role' => 'form', 'method' => 'put']) !!}
            @include('forms.user', ['submitButtonText' => 'Save user'])
            {!! Form::close() !!}
        </div>
    </div>
@stop
