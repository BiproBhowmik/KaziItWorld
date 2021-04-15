@extends('frontend/layout/master')

@section('frontendContent')

@include('frontend/frontendPartial/header')

@include('frontend/slider')

  <main id="main">

	@include('frontend/aboutus')
	@include('frontend/service')
	@include('frontend/portfolio')
  @include('frontend/team')
	@include('frontend/ourclint')
	@include('frontend/testimonial')

  </main><!-- End #main -->

  @include('frontend/frontendPartial/footer')
  
@endsection