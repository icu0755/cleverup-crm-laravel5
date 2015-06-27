@extends('layout')

@section('content')
    <div class="container">
        <h1>Lessons</h1>
        {!! Form::open(['route' => 'lessons.index', 'role' => 'form', 'class' => 'form-inline']) !!}
            <div class="form-group">
                <label for="from">From:</label>
                <input type="date" name="from" id="from"/>
            </div>
            <div class="form-group">
                <label for="to">To:</label>
                <input type="date" name="to" id="from"/>
            </div>
            <input type="submit" class="btn btn-primary" value="Filter"/>
        {!! Form::close() !!}
        <div style="margin-top: 20px;">
            <table class="table">
                <tr>
                    <th>Given at</th>
                </tr>
                @foreach($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->given_at }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
