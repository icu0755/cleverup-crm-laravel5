@extends('layout')

@section('sidebar')
<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li>{!! link_to_route('customers.showCustomers', 'Show customers') !!}</li>
    </ul>
</div>
@stop

@section('content')
<div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-2 main">
    @include('message')
    {!! Form::model($customer, array('action' => array('CustomerController@editCustomer', $customer->id))) !!}
        @include('forms.customer')
    {!! Form::close() !!}
</div>
@stop