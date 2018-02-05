<!DOCTYPE html>
<html>
<head>
	@include('admin.includes.head')
</head>
<body >
	<!-- START PAGE CONTAINER -->
	<div class="page-container"  ng-app="easyadminapp">
	<div class="http-loader-div" data-loading >
    <img src="{!! asset('admin/img/loaders/loader_seq.gif'); !!}" class="ajax-loader"/>
	</div>

	@include('admin.includes.sidebar')
	@include('admin.includes.header')

	@yield('content')

	@include('admin.includes.footer')

</div>
</body>
</html>