@extends('layout')

@section('sidebar')
    <ul class="nav nav-sidebar">
    </ul>
@stop

@section('content')
    <h1 class="page-header">Users</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Was at</th>
            </tr>
        </thead>
        <tbody>
        @foreach($attendance as $a)
            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->wasAt}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop