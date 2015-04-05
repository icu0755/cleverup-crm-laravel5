<div class="form-group">
{!! Form::label('comment', 'Comment') !!}
{!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>
{!! Form::submit('Save', ['class' => 'btn btn-default']) !!}