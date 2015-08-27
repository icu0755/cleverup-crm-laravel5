@extends('layout')

@section('sidebar')
    <ul class="nav nav-sidebar">
        <li>{!! link_to_route('users.index', 'Users') !!}</li>
        <li>{!! link_to_route('users.create', 'Add user') !!}</li>
    </ul>
@stop

@section('content')
    <div class="wrapper">
        @include('message')
        <div class="form-wrapper">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'role' => 'form', 'method' => 'put']) !!}
            @include('forms.user', ['submitButtonText' => 'Save user', 'roles' => $roles])
            {!! Form::close() !!}
        </div>
    </div>
@stop
