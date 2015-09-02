@extends('layout')

@section('sidebar')
    <ul class="nav nav-sidebar">
    </ul>
@stop

@section('content')
    <h1 class="page-header">Attendance</h1>
    {!! Form::open(['route' => ['attendance.store', $groupId]]) !!}
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::input('date', 'date', $date, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::input('time', 'time', $time, ['class' => 'form-control']) !!}
        </div>
        <table class="table table-stripped">
            <tr>
                <th>Name</th>
                <th style="width: 20px;"></th>
            </tr>
            @foreach($customers as $c)
                <tr>
                    <td>{{ $c }}</td>
                    <td style="width: 20px;">
                        {!! Form::checkbox('customers[]', $c->id) !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop