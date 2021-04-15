    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Clients</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

          @php
  use App\Models\OurClints;
  $clints = OurClints::select('*')->orderby('clVal', 'DESC')->get();
  @endphp

          @foreach ($clints as $element)

          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="{{ Storage::url($element->clLogo) }}" class="img-fluid" alt="">
            </div>
          </div>

          @endforeach

        </div>

      </div>
    </section><!-- End Our Clients Section -->