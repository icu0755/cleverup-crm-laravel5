@extends('layout')

@section('sidebar')
<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li>{!!link_to_route('customer-groups.showGroups', 'Show groups')!!}</li>
    </ul>
</div>
@stop

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Add group</h1>
    @include('message')
    {!! Form::open(array('url' => 'customer-groups/add')) !!}
        @include('forms.customer-group')
    {!! Form::close() !!}
</div>
@stop