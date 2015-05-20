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
        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '71234567890']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'john.doe@example.com']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('birthday', 'Birthday') !!}
        {!! Form::text('birthday', null, ['class' => 'form-control datepicker', 'placeholder' => '1999-12-31']) !!}
    </div>
    {!! Form::submit('Save', ['class' => 'btn btn-default']); !!}
