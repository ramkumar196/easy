<!DOCTYPE html>
<html>
<head>
	@include('frontend.includes.head')
</head>
<body ng-app="easyapp">
	@include('frontend.includes.header')
<div class="body-content" id="top-banner-and-menu">
	@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="http-loader-div" data-loading >
			<div class="loader">
  <div class="load_base load1">
    <div class="load_base out_loader"></div>
  </div>
  <div class="load_base load2">
    <div class="load_base in_loader in_loader1"></div>
    <div class="load_base in_loader in_loader2"></div>
    <div class="load_base in_loader in_loader3"></div>
    <div class="load_base in_loader in_loader4"></div>
  </div>
</div>
   <!-- <img src="{!! asset('frontend/images/loaders/loader_seq.gif') !!}" class="ajax-loader"/>-->
	</div>

	@yield('content')

	@include('frontend.includes.footer')
</div>
</div>
</body>
</html>
