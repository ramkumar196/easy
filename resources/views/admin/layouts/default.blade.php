<!DOCTYPE html>
<html>
<head>
	@include('admin.includes.head')
</head>
<body >
	<!-- START PAGE CONTAINER -->
	<div class="page-container"  ng-app="easyadminapp">
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
    <img src="{!! asset('admin/img/loaders/loader_seq.gif'); !!}" class="ajax-loader"/>
	</div>

	@include('admin.includes.sidebar')
	@include('admin.includes.header')

	@yield('content')

	@include('admin.includes.footer')

</div>
</body>
</html>