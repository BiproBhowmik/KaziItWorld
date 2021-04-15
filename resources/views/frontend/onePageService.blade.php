@extends('frontend/layout/master')

@section('frontendContent')

@include('frontend/frontendPartial/header')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Services</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Services</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

  <main id="main">
    
  @include('frontend/service')

  </main><!-- End #main -->

  @include('frontend/frontendPartial/footer')
  
@endsection