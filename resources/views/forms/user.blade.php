<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('roles', 'Role:') !!}
    {!! Form::select('roles', $roles, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-default']) !!}