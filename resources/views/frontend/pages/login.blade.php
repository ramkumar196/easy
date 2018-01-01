@extends('frontend.layouts.default')
@section('content')

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
<div class="container">
	<div class="breadcrumb-inner">
		<ul class="list-inline list-unstyled">
			<li><a href="home.html">Home</a></li>
			<li class='active'>Login</li>
		</ul>
	</div><!-- /.breadcrumb-inner -->
</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
<div class="container">
	<div class="sign-in-page">
		<div class="row">
			<!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in">
<h4 class="">Sign in</h4>
<p class="">Hello, Welcome to your account.</p>
<div class="social-sign-in outer-top-xs">
	<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
	<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
</div>
<form class="register-form outer-top-xs"  method="POST" action="{{ route('login') }}" role="form">
{{ csrf_field() }}

	<div class="form-group">
		<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		<input type="email" class="form-control unicase-form-control text-input" placeholder="Email Address" name="email" value="{{ old('email') }}" required autofocus >
					@if ($errors->has('email'))
							<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
							</span>
					@endif
	</div>
	  <div class="form-group">
		<label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
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
	  <h4 class="animated wow slideInUp" data-wow-delay=".5s">For New People</h4>
			<p class="animated wow slideInUp" data-wow-delay=".5s"><a href="{{ route('register')}}">Register Here</a> (Or) go back to <a href="index.html">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		
</form>
</div>
</div>
</div>
</div>


<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->

</div><!-- /.logo-slider -->

@endsection
