@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-sidebar">
                <li>{!! link_to_route('customers.addForm', 'Add customer') !!}</li>
            </ul>
        </div>

        <div class="col-md-9 main">
            <h1 class="page-header">Customers</h1>
            <table class="customers-table" cellspacing="0" width="100%"></table>
        </div>
    </div>
</div>
@stop