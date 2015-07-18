<div class="form-group">
    {!! Form::label('amount', 'Amount') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>
{!! Form::submit('Add', ['class' => 'btn btn-default']) !!}