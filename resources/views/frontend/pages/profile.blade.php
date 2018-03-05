@extends('frontend.layouts.default')
@section('content')

<div class="body-content"   >
<div class="container"  ng-controller="EditProfileController">
    <div class="sign-in-page">
<div class="row">
<div class="col-md-6 col-sm-6 create-new-account">
<h4 class="checkout-subtitle">Your Profile</h4>
<p class="text title-tag-line"></p>
<form class="register-form outer-top-xs"  action="" method="POST" role="form">
    <div class="form-group">
        <!--<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>-->
        <input type="email" placeholder="Email Address" class="form-control unicase-form-control text-input" name="email" value="{{ old('email') }}" required autofocus >
                    @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
      </div>
    <input type="hidden" id="user_id"  name="userid" value="{{ session()->get('userid') }}" >

    <div class="form-group">
        <!--<label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>-->
        {{ csrf_field() }}
        <input type="text" placeholder="First Name..." class="form-control unicase-form-control text-input" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
            <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <!--<label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>-->
        <input type="phone" name="phone" placeholder="Mobile Number" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{ old('name') }}" >
        @if ($errors->has('phone'))
            <span class="help-block">
            <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <!--<label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>-->
        <input id="password" type="password" class="form-control unicase-form-control text-input" placeholder="Password" name="password" required >
                    @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                            </span>
                    @endif
    </div>
     <div class="form-group">
        <!--<label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>-->
        <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
    </div>
      <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
</form>


</div>
<!-- create a new account -->           </div><!-- /.row -->
    </div><!-- /.sigin-in-->
</div>


</div><!-- /.logo-slider -->
        <script src="{!! asset('frontend/js/angular/profile.js') !!}"></script>

@endsection

