@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white;">
        <div class="row">
            <div class="col-md-5">
                <img src="{{asset('images/logo.jpg')}}"/>
            </div>
            <div class="col-md-7">
                <br/> <br/>
                <h3 class="text-center">
                    <b>Register Your Account Now</b> <br/>
                    <small>Get Access To Plenty Of Scientific Papers</small>
                </h3>
                <br/>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Username</label>

                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon1"><i
                                            class="fa fa-user-circle"></i></span>
                                <input id="username" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                       placeholder="Enter your username" aria-describedby="sizing-addon1" required
                                       autofocus>
                            </div>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" placeholder="Enter your e-mail address"
                                       aria-describedby="sizing-addon2" required>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-key"></i></span>
                                <input id="password" type="password" class="form-control" name="password"
                                       placeholder="Enter your password" aria-describedby="sizing-addon3" required>
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon4"><i class="fa fa-key"></i></span>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" placeholder="Confirm your password"
                                       aria-describedby="sizing-addon4" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-success" style="border-radius: 30px;">
                                &nbsp; Register &nbsp; <i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp;
                            </button>
                        </div>
                    </div>

                </form>

                <div class="form-group" style="margin-left: 125px;">
                    <div class="col-md-6 col-md-offset-2">
                        <h5 style="display: inline;">Already have an account? &nbsp;</h5>
                        <a href="{{ route('login') }}">Log in <i class="fa fa-sign-in" aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
