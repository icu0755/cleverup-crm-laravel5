@extends('layout')

@section('sidebar')
<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li>{!!link_to_route('customers.edit', 'Edit customer', ['customerId' => $customer->id])!!}</li>
        <li>{!!link_to_route('customers.showCustomers', 'Show customers')!!}</li>
    </ul>
</div>
@stop

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    @include('message')
    <h1 class="page-header">Customer information</h1>
    <div>Name: {!!$customer->firstname . " " . $customer->lastname!!}</div>
    <div>Group: {!!$customer->group->groupname or htmlspecialchars('<empty>')!!}</div>
    <h2 class="sub-header">Send SMS</h2>
    {!! Form::open(['route' => ['sms.customer', $customer->id], 'role' => 'form']) !!}
        @include('forms.sms')
    {!! Form::close() !!}
    <h2 class="sub-header">Comments</h2>
    @if($customer->comments())
        <ul>
        @foreach($customer->comments as $comment)
            <li>{!!$comment->comment!!}</li>
        @endforeach
        </ul>
    @endif
</div>
@stop