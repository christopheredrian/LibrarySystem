<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    {!! Form::label('date', 'Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('date', null, ['class' => 'form-control']) !!}
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('startTime') ? 'has-error' : ''}}">
    {!! Form::label('startTime', 'Starttime', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('time', 'startTime', null, ['class' => 'form-control']) !!}
        {!! $errors->first('startTime', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('endTime') ? 'has-error' : ''}}">
    {!! Form::label('endTime', 'Endtime', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('time', 'endTime', null, ['class' => 'form-control']) !!}
        {!! $errors->first('endTime', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
