@extends('layouts.app')

@section('content')
<div class="container" style="background-color: white;">
    <div class="row">
        <div class="col-md-5 col-xs-12">
            <img src="{{asset('images/logo.jpg')}}"/>
        </div>
        <div class="col-md-7 col-xs-12">
            <br/> <br/> <br/> <br/>
            <h3 class="text-center"><b>Log in into your account</b></h3>
            <br/>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-7">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope-o"></i></span>
                            <input id="email" type="email" placeholder="Enter your e-mail address" class="form-control" name="email" value="{{ old('email') }}" aria-describedby="sizing-addon2" required autofocus>
                        </div>
                        @if ($errors->has('email'))
                            <p class="text-danger"><strong>{{ $errors->first('email') }}</strong></p>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>
                    <div class="col-md-7">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-key"></i></span>
                            <input id="password" type="password" placeholder="Enter your password" class="form-control" name="password" aria-describedby="sizing-addon2" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-success" style="border-radius: 30px;">
                            &nbsp; Login &nbsp; <i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp;
                        </button>

                    </div>
                </div>
            </form>
            <<div class="form-group" style="margin-left: 125px; margin-top: -20px;">
                <div class="col-md-6 col-md-offset-2">
                    <h5 style="display: inline;">Don't have an account? &nbsp;</h5>
                    <a href="{{ route('register') }}">Register <i class="fa fa-sign-in" aria-hidden="true"></i> </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
