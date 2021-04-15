    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Testimonials</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

                    @php
  use App\Models\Testimonial;
  $team = Testimonial::select('*')->orderby('tsTmValue', 'DESC')->get();
  @endphp

          @foreach ($team as $element)

          <div class="col-lg-6" data-aos="fade-up">
            <div class="testimonial-item">
              <img src="{{ Storage::url($element->tsTmPho) }}" class="testimonial-img" alt="">
              <h3>{{ $element->tsTmName }}</h3>
              <h4>{{ $element->tsTmPosition }}</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                {{ $element->tsTmSpeach }}
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

          @endforeach

        </div>

      </div>
    </section><!-- End Testimonials Section -->