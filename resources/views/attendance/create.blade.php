@extends('layout')

@section('sidebar')
    <ul class="nav nav-sidebar">
    </ul>
@stop

@section('content')
    <h1 class="page-header">Attendance</h1>
    <table class="table table-stripped">
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
        @foreach($customers as $c):
        <tr>
            <td>{{ $c }}</td>
            <td>
                <input type="checkbox"/>
            </td>
        </tr>
        @endforeach
    </table>
@stop