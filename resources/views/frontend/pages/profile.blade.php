@extends('frontend.layouts.default')
@section('content')

<div class="body-content"   >
<div class="container"  ng-controller="UserProfileController">
    <div class="sign-in-page">
<div class="row">
<div class="col-md-6 col-sm-6 create-new-account">
<h4 class="checkout-subtitle">Your Profile</h4>
<p class="text title-tag-line"></p>
<form class="register-form outer-top-xs"  method="POST" role="form">
    <div class="form-group">
        <!--<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>-->
        <input type="email" placeholder="Email Address" class="form-control unicase-form-control text-input" name="email" ng-model="useremail" value="" required autofocus >
        <span class="help-block" ng-if="errors.email[0]!= ''">
                <strong>@{{errors.email[0]}}</strong>
        </span>
      </div>
    <input type="hidden" id="user_id"  name="userid" value="{{ session()->get('userid') }}" >

    <div class="form-group">
        <!--<label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>-->
        {{ csrf_field() }}
        <input type="text" placeholder="First Name..." class="form-control unicase-form-control text-input" name="name"  ng-model="username" value="" required autofocus>
        <span class="help-block" ng-if="errors.name[0]!= ''">
                <strong>@{{errors.name[0]}}</strong>
        </span>
    </div>
    <div class="form-group">
        <!--<label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>-->
        <input type="phone" name="phone" placeholder="Mobile Number" class="form-control unicase-form-control text-input" ng-model="userphone" id="exampleInputEmail1" value="" >
        <span class="help-block" ng-if="errors.phone[0]!= ''">
                <strong>@{{errors.phone[0]}}</strong>
        </span>
    </div>
    <input type="hidden" name="userid"  id="userid" value="" >
    <div class="form-group">
        <!--<label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>-->
        <input id="password" type="password" ng-model="password" class="form-control unicase-form-control text-input" placeholder="Password" ng-model="password" name="password" required >
         <span class="help-block" ng-if="errors.password[0]!= ''">
                <strong>@{{errors.password[0]}}</strong>
        </span>

    </div>
     <div class="form-group">
        <!--<label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>-->
        <input type="password" placeholder="Confirm Password" ng-model="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input" id="exampleInputEmail1" > 
        <span class="help-block" ng-if="errors.password_confirmation[0]!= ''">
                <strong>@{{errors.password_confirmation[0]}}</strong>
        </span>
    </div>
    <button  ng-click="editprofile()" class="btn btn-primary">Update</button>
</form>


</div>
<!-- create a new account -->           </div><!-- /.row -->
    </div><!-- /.sigin-in-->
</div>


</div><!-- /.logo-slider -->
        <script src="{!! asset('frontend/js/angular/profile.js') !!}"></script>

@endsection

