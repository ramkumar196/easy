@extends('admin.layouts.login')

@section('content')

<div class="login-container">

            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form class="form-horizontal" method="POST" action="{{ route('auth.admin-login.submit') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control"  placeholder="Email" name="email" value="{{ old('email') }}"/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" name="password"/>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                      <!--  <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>-->
                        <div class="col-md-6">
                            <input type="submit"  class="btn btn-info btn-block" value="Log In">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; Future Store
                    </div>
                   <!--  <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div> -->
                </div>
            </div>

        </div>
@endsection
