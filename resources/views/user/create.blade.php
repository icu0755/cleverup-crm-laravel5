@extends('layout')

@section('sidebar')
    <ul class="nav nav-sidebar">
        <li>{!! link_to_route('users.index', 'Users') !!}</li>
    </ul>
@stop

@section('content')
    <div class="wrapper">
        @include('message')
        <div class="form-wrapper">
            {!! Form::open(['route' => 'users.store', 'role' => 'form']) !!}
            @include('forms.user', ['submitButtonText' => 'Create user', 'roles' => $roles])
            {!! Form::close() !!}
        </div>
    </div>
@stop
