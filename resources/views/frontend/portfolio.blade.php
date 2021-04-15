    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

          @php
          use App\Models\OurClints;
          use App\Models\Portfolio;
          $portfolio = Portfolio::select('*')->orderby('prVal', 'DESC')->get();
          @endphp

          @foreach ($portfolio as $element)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ Storage::url($element->prPho) }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{ $element->prTitle }}</h4>
              <p>{{ $element->prCate }}</p>
              <a href="{{ Storage::url($element->prPho) }}" data-gall="portfolioGallery" class="venobox preview-link" title="Zoom"><i class="bx bx-plus"></i></a>
              <a href="{{ route('porDetails', $element->prId) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Portfolio Section -->