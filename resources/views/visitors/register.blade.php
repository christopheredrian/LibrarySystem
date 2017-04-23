@extends('layouts.app')

<div class="container">
    <div class="row">

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Visitor Registration</div>
                <div class="panel-body">
                    <br/>
                    <br/>

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif


                    {!! Form::open(['url' => '/admin/visitors', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('admin.visitors.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>