    <div class="form-group">
        {!! Form::label('group_id', 'Group') !!}
        {!! Form::select('group_id', $groups, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('firstname', 'First name') !!}
        {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('lastname', 'Last name') !!}
        {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone', 'Phone') !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Save', ['class' => 'btn btn-default']); !!}
