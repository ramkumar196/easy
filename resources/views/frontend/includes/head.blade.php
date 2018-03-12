<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>Easy</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{!! asset('frontend/css/bootstrap.min.css'); !!}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{!! asset('frontend/css/main-violet.css') !!}">
<link rel="stylesheet" href="{!! asset('frontend/css/violet.css') !!}">
<link rel="stylesheet" href="{!! asset('frontend/css/owl.carousel.css') !!}">
<link rel="stylesheet" href="{!! asset('frontend/css/owl.transitions.css') !!}">
<link rel="stylesheet" href="{!! asset('frontend/css/animate.min.css') !!}">
<link rel="stylesheet" href="{!! asset('frontend/css/rateit.css') !!}">
<link rel="stylesheet" href="{!! asset('frontend/css/bootstrap-select.min.css') !!}">


<script>
	@if (session()->has('userid'))
	var USERID = '{{session()->get('userid')}}';
	@else
	var USERID = '';
	@endif
</script>
<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{!! asset('frontend/css/font-awesome.css') !!}">

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
  <script type="text/javascript" src="{!! asset('frontend/js/angular/plugins/alertify.js'); !!}"></script>
  <script type="text/javascript" src="{!! asset('frontend/js/angular/plugins/angular-filter.js'); !!}"></script>
<script type="text/javascript" src="{!! asset('frontend/js/angular/plugins/angular-sanitize.js'); !!}"></script>
  <script type="text/javascript" src="{!! asset('frontend/js/angular/dirPagination.js'); !!}"></script>
  <script type="text/javascript" src="{!! asset('frontend/js/angular/plugins/angular-owl-carousel.js'); !!}"></script>
  <script type="text/javascript" src="{!! asset('frontend/js/angular/plugins/angular-checklist.js'); !!}"></script>
   <script type="text/javascript" src="{!! asset('frontend/js/angular/plugins/angular-autocomplete.js'); !!}"></script>
   <script type="text/javascript" src="{!! asset('frontend/js/angular/plugins/angular-massautocomplete.js'); !!}"></script>
  <script type="text/javascript" src="{!! asset('frontend/js/angular/app.js'); !!}"></script>
  <script type="text/javascript" src="{!! asset('frontend/js/angular/header.js'); !!}"></script>

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>