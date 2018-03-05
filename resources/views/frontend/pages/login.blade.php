@extends('frontend.layouts.default')
@section('content')

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
<div class="container">
<div class="body-content">
<div class="container">
	<div class="sign-in-page">
		<div class="row">
			<!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in">
<h4 class="">Sign in</h4>
<p class="">Hello, Welcome to your account.</p>
<form class="register-form outer-top-xs"  method="POST" action="{{ route('login') }}" role="form">
{{ csrf_field() }}

	<div class="form-group">
		<!--<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>-->
		<input type="email" class="form-control unicase-form-control text-input" placeholder="Email Address" name="email" value="{{ old('email') }}" required autofocus >
					@if ($errors->has('email'))
							<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
							</span>
					@endif
	</div>
	  <div class="form-group">
		<!--<label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>-->
		<input type="password" class="form-control unicase-form-control text-input" placeholder="Password" name="password" value="{{ old('password') }}" required autofocus >
		@if ($errors->has('password'))
				<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
				</span>
		@endif	</div>
	<div class="radio outer-xs">
		  <label>
		  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
Remember me!
		  </label>
		  <a href="href="{{ route('password.request') }}"" class="forgot-password pull-right">Forgot your Password?</a>
	</div>
	  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
	 <a href="{{ route('register')}}"> <button type="button" class="btn-upper btn btn-primary checkout-page-button">Register</button></a>
	 <div class="social-sign-in outer-top-xs">
	<p><a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
	<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a></p>
</div>
		
</form>
</div>
</div>
</div>
</div>
</div>
</div>

</div><!-- /.logo-slider -->

@endsection
