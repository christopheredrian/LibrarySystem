<div class="form-group {{ $errors->has('firstName') ? 'has-error' : ''}}">
    {!! Form::label('firstName', 'Firstname', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('firstName', null, ['class' => 'form-control']) !!}
        {!! $errors->first('firstName', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lastName') ? 'has-error' : ''}}">
    {!! Form::label('lastName', 'Lastname', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('lastName', null, ['class' => 'form-control']) !!}
        {!! $errors->first('lastName', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('purpose') ? 'has-error' : ''}}">
    {!! Form::label('purpose', 'Purpose', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('purpose', null, ['class' => 'form-control']) !!}
        {!! $errors->first('purpose', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
