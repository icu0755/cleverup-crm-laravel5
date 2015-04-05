<div class="datepair">
    <div class="form-group">
        {!! Form::label('group_id', 'Group') !!}
        {!! Form::select('group_id', $groups, null, ['class' => 'form-control']) !!}
    </div>
    <div  class="form-group">
        {!! Form::label('day_of_week', 'Day of week') !!}
        {!! Form::select('day_of_week', $daysOfWeek, $dayOfWeek, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('time_from', 'Time from: ')!!}
        {!!Form::text('time_from', $start, ['class' => 'form-control time start'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('time_to', 'Time to: ')!!}
        {!!Form::text('time_to', $end, ['class' => 'form-control time end'])!!}
    </div>
    {!! Form::submit('Save', ['class' => 'btn btn-default']); !!}
    @if(isset($event))
        {!! link_to_route('events.remove', 'Remove', $event->id, ['class' => 'btn btn-danger']) !!}
    @endif
</div>