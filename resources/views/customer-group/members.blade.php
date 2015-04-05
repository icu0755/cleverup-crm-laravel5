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
    <h1 class="page-header">Members</h1>
    @if (count($group->customers) === 0)
        The group does not have any members
    @else
        <ul>
        @foreach($group->customers as $customer)
            <li>{!!$customer->firstname!!} {!!$customer->lastname!!}</li>
        @endforeach
        </ul>
    @endif

    <h2 class="sub-header">Comments</h2>
    @if (count($group->comments) === 0)
        <div>The group does not have any members</div>
    @else
        <ul>
        @foreach($group->comments as $comment)
            <li>{!!nl2br($comment->comment)!!}</li>
        @endforeach
        </ul>
    @endif

    <h2 class="sub-header">Add comment</h2>
    {!! Form::open(array('route' => array('customer-groups.comments.add', $group->id))) !!}
    @include('forms.comment')
    {!! Form::close() !!}
</div>
@stop
