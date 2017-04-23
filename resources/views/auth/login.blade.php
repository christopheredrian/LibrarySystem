@extends('layouts.app')

@section('css')
    <style>
        .row.logo-row {
            text-align: center !important;
        }

        .row.logo-row h1 {
            text-transform: uppercase;
        }
        .row.logo-row img {
            margin: -40px 0 -30px 0;
        }
    </style>
@endsection

@section('content')
    <div class="container">

        <div class="row logo-row">
            <img src="/images/logo.png" alt="CVCITC logo">
            <h1>cvcitc</h1>
            <p>Cagayan Valley Computer and Information Technology College, INC.</p>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Id</label>

                                <div class="col-md-6">
                                    <input id="username" type="username" class="form-control" name="username"
                                           value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--Forgot Your Password?--}}
                                    {{--</a>--}}

                                </div>
                            </div>

                        </form>
                        <button type="submit" class="btn btn-success" style="float: right" id="visitorBtn">
                            Log in as Visitor
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(isset($student_msg))
        <script>
            alert('{{ $student_msg }}');
        </script>
    @endif
    <script>

    </script>
@endsection

@section('js')
    <script>

        (function () {
            document.getElementById('visitorBtn').onclick = function () {
                window.location.href = "/visitor";
            }
        })();
    </script>
@endsection
