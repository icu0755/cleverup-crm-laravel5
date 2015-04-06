@extends('layout')

@section('content')
    <div class="container-fluid">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                @include('widgets.groups')
            </div>
            <div class="col-md-3 col-sm-6">
                @include('widgets.birthday')
            </div>
            <div class="col-md-3 col-sm-6">
                @include('widgets.pending-payments')
            </div>
            <div class="col-md-3 col-sm-6">
                @include('widgets.last-payments')
            </div>
        </div>
    </div>
@endsection