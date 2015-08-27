@extends('layout')

@section('sidebar')
    <ul class="nav nav-sidebar">
        <li>{!! link_to_route('users.create', 'Add user') !!}</li>
    </ul>
@stop

@section('content')
    <h1 class="page-header">Users</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->rolesAsString()}}</td>
                <td>
                    <a href="{{ route('users.edit', ['users' => $user->id]) }}" class="btn btn-primary">edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop