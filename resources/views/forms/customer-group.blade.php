<div  class="form-group">
    {!! Form::label('groupname', 'Group') !!}
    {!! Form::text('groupname', null, ['class' => 'form-control']) !!}
</div>
{!! Form::submit('Save', ['class' => 'btn btn-default']); !!}
