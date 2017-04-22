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
</div><div class="form-group {{ $errors->has('middleName') ? 'has-error' : ''}}">
    {!! Form::label('middleName', 'Middlename', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('middleName', null, ['class' => 'form-control']) !!}
        {!! $errors->first('middleName', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('course') ? 'has-error' : ''}}">
    {!! Form::label('course', 'Course', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('course', ['BSIT', 'BSCS', 'BSM', 'BSN', 'BALA', 'BSLIS'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('course', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('yearLevel') ? 'has-error' : ''}}">
    {!! Form::label('yearLevel', 'Yearlevel', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('yearLevel', ['1st year', '2nd year', '3rd year', '4th year'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('yearLevel', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    {!! Form::label('category', 'Category', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('category', ['student', 'admin'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('status', ['in', 'out'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
    {!! Form::label('username', 'Username', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('username', null, ['class' => 'form-control']) !!}
        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
