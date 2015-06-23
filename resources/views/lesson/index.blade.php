@extends('layout')

@section('content')
    <div class="container-fluid">
        <h1>Lessons</h1>
        <h2>Add lesson</h2>
        <form id="lesson-add" method="post" action="{{route('lessons.store')}}">
            <input name="given_at" type="text">
            <input name="group_id" type="text">
            <input type="submit">
        </form>
        <h2>Lessons list:</h2>
        <div id="lessons">

        </div>
    </div>
    <script>


    </script>
@stop
