<!DOCTYPE html>
<html>
<head>
	@include('frontend.includes.head')
</head>
<body>
<div class="body-content " ng-app="easyapp" id="top-banner-and-menu">
<div class="http-loader-div" data-loading >
    <img src="{!! asset('frontend/images/loaders/loader_seq.gif') !!}" class="ajax-loader"/>
	</div>

	@include('frontend.includes.header')


	@yield('content')

	@include('frontend.includes.footer')
</div>
</body>
</html>
