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
    <img src="{!! asset('frontend/images/loaders/loader_seq.gif') !!}" class="ajax-loader"/>
	</div>

	@yield('content')

	@include('frontend.includes.footer')
</div>
</div>
</body>
</html>
