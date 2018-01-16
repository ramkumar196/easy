@extends('frontend.layouts.default')
@section('content')

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
<div class="container">
	<div class="breadcrumb-inner">
		<ul class="list-inline list-unstyled">
			<li><a href="home.html">Home</a></li>
			<li class='active'>Register</li>
		</ul>
	</div><!-- /.breadcrumb-inner -->
</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
<div class="container">
	<div class="sign-in-page">
<div class="row">
<div class="col-md-6 col-sm-6 create-new-account">
<h4 class="checkout-subtitle">Create a new account</h4>
<p class="text title-tag-line"></p>
<form class="register-form outer-top-xs"  action="{{ route('register') }}" method="POST" role="form">
	<div class="form-group">
		<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
		<input type="email" placeholder="Email Address" class="form-control unicase-form-control text-input" name="email" value="{{ old('email') }}" required autofocus >
					@if ($errors->has('email'))
							<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
							</span>
					@endif
	  </div>
	<div class="form-group">
		<label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
		{{ csrf_field() }}
		<input type="text" placeholder="First Name..." class="form-control unicase-form-control text-input" name="name" value="{{ old('name') }}" required autofocus>
		@if ($errors->has('name'))
			<span class="help-block">
			<strong>{{ $errors->first('name') }}</strong>
			</span>
		@endif
	</div>
	<div class="form-group">
		<label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
		<input type="phone" name="phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{ old('name') }}" >
		@if ($errors->has('phone'))
			<span class="help-block">
			<strong>{{ $errors->first('phone') }}</strong>
			</span>
		@endif
	</div>
	<div class="form-group">
		<label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		<input id="password" type="password" class="form-control unicase-form-control text-input" placeholder="Password" name="password" required >
					@if ($errors->has('password'))
							<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
							</span>
					@endif
	</div>
	 <div class="form-group">
		<label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
		<input type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
	</div>
	  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
</form>


</div>
<!-- create a new account -->			</div><!-- /.row -->
	</div><!-- /.sigin-in-->
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

