    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Our <strong>Team</strong></h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          @php
  use App\Models\OurTeam;
  $team = OurTeam::select('*')->orderby('tmValue', 'DESC')->get();
  @endphp

          @foreach ($team as $element)

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="{{ Storage::url($element->tmPho) }}" class="img-fluid" alt="">
                <div class="social">
                  <a href="{{ $element->tmTwLink }}"><i class="icofont-twitter"></i></a>
                  <a href="{{ $element->tmFbLink }}"><i class="icofont-facebook"></i></a>
                  <a href="{{ $element->tmInLink }}"><i class="icofont-instagram"></i></a>
                  <a href="{{ $element->tmLnLink }}"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>{{ $element->tmName }}</h4>
                <span>{{ $element->tmPosition }}</span>
              </div>
            </div>
          </div>

          @endforeach

        </div>

      </div>
    </section><!-- End Our Team Section -->