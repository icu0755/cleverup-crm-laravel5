<div class="form-group">
{!! Form::label('message', 'Message') !!}
{!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>
{!! Form::submit('Send', ['class' => 'btn btn-default']) !!}