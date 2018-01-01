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
	@if (session('status'))
			<div class="alert alert-success">
					{{ session('status') }}
			</div>
	@endif
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Reset Password</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
				deserunt mollit anim id est laborum.</p>

			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form  method="POST" action="{{ route('password.email') }}">

					<input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autofocus >
					@if ($errors->has('email'))
							<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
							</span>
					@endif
					<input type="submit" value="Send Password Reset Link">
				</form>
			</div>
		</div>
	</div>
<!-- //login -->
@endsection
