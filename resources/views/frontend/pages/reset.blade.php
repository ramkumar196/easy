@extends('frontend.layouts.default')
@section('content')
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Reset Password</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Reset Password Form</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
				deserunt mollit anim id est laborum.</p>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form  method="POST" action="{{ route('password.request') }}">
					<input type="hidden" name="token" value="{{ $token }}">

					<input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autofocus >
					@if ($errors->has('email'))
							<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
							</span>
					@endif
					<input type="password" placeholder="Password" name="password" value="{{ old('password') }}" required autofocus >
					@if ($errors->has('password'))
							<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
							</span>
					@endif
					<div class="forgot">
						<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
						<a class="btn btn-link" href="{{ route('password.request') }}">
								Forgot Your Password?
						</a>
					</div>
					<input type="submit" value="Reset Password">
				</form>
			</div>
			<p class="animated wow slideInUp" data-wow-delay=".5s"><a href="{{ route('login')}}">Login Here</a> (Or) go back to <a href="index.html">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->
@endsection
