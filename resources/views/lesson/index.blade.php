@extends('layout')

@section('content')
    <div class="container">
        <h1>Lessons</h1>
        {!! Form::open(['route' => 'lessons.index', 'role' => 'form', 'class' => 'form-inline']) !!}
            <div class="form-group">
                <label for="from">From:</label>
                <input type="date" name="from" id="from" value="{{$from}}"/>
            </div>
            <div class="form-group">
                <label for="to">To:</label>
                <input type="date" name="to" id="from" value="{{$to}}"/>
            </div>
            <input type="submit" class="btn btn-primary" value="Filter"/>
        {!! Form::close() !!}
        {!! Form::open(['route' => 'lessons.store', 'role' => 'form', 'class' => 'form-inline']) !!}
        <div class="form-group">
            <label for="group_id">Group:</label>
            <select name="group_id" id="group_id" class="form-control">
                <option value="">Select group</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->groupname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="given_at">Given at:</label>
            <input type="date" name="given_at" id="given_at" value="{{$now}}"/>
        </div>
        <input type="submit" class="btn btn-primary" value="Add"/>
        {!! Form::close() !!}
        <div style="margin-top: 20px;">
            <table class="table">
                <tr>
                    <th>Group</th>
                    <th>Given at</th>
                </tr>
                @foreach($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->group->groupname }}</td>
                        <td>{{ $lesson->given_at }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
