@extends('USER_VIEW.layouts.main')
@section('content')
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('userside/assets/img/breadcrumbs-bg.jpg') }}');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

      <h2>About</h2>
      <ol>
        <li><a href="{{ route('user_home') }}">Home</a></li>
        <li>About</li>
      </ol>

    </div>
  </div>
<section id="about" class="about">
    <div class="container" data-aos="fade-up">
      <div class="row position-relative">
        <div class="col-lg-7 about-img" style="background-image: url({{ asset('userside/assets/img/about.jpg') }});"></div>
        <div class="col-lg-7">
          <h2>Brief History of the Company</h2>
          <div class="our-story">
            <h3>Our Story</h3>
            <p>The co-op’s official seal is a gear with nine (9) toothed wheels to represent the original nine (9) municipalities that comprised the area coverage of the co-op which were Tubigon, Clarin, Sagbayan, Catigbian, San Isidro, Balilihan, Calape, Loon and Antequera.
              Inscribed at the inner portion of the gear are small nipa huts to represent most of the typical households found in our barangays which were energized as shown in the form of lightning streaks. A 3-phase line represents the energization of the backbone lines of the nine (9) municipalities even passing and crossing the Chocolate Hills as what Bohol is known for.
              August 11, 1971 indicates the date when the co-op was registered and incorporated and Tubigon, Bohol below is the municipality where the main headquarters of the co-op is located.</p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span><strong>BOHECO I HEADQUARTERS</strong></span></li>
              <p>Most of the towns served by the co-op are classified as lower middle class with a handful considered as affluent and several are living below the poverty level.</p>
              <li><i class="bi bi-check-circle"></i> <span><strong>First town energization – Dec. 30, 1974, Tubigon with Gen. Pedro Dumol as the guest of honor.</strong></span></li>
              <p>Then its neighboring seventeen (17) towns clamored for its inclusion, prompting the co-op officials to avail an additional loan from NEA amounting to Php17M which was signed by Board President Melchor P. Monreal and Administrator Pedro Dumol on January 12, 1980.</p>
              The co-op is a residential-based, approximately 56.85% of the total KWHR sold. Commercial and industrial loads are about 32.32%, while the combine irrigation , water system, public buildings and streetlights load is approximately 10.83%.</p>
              <li><i class="bi bi-check-circle"></i> <span><strong>Bohol I Electric Cooperative, Inc. brought the first streaks of energization into a sleepy province just as the decade of the 70’s was coming into view.</strong></span></li>
              <p>From its infant stages, BOHECO I’s coverage area had been the northern and western towns of the province, eventually expanding to most of the interior towns in the west.</p>
                <p>Originally, the co-op was only serving nine (9) municipalities with an initial cash outlay in a form of loan from NEA in the amount of Php2,958,000.00. The loan contract was signed by its first Board President, Mr. Simeon P. Luayon and NEA Administrator Pedro G. Dumol on October 1, 1971.</p>
                <p> On December 30, 1974, the co-op was able to energize the backbone lines in Tubigon from the location of its power plant in barangay Maca-as, to Poblacion, Tubigon running a line of approximately 4 kms. In 1975, the rest of the backbone lines of the remaining eight (8) original towns were energized.</p>
            </ul>
            <div class="watch-video d-flex align-items-center position-relative">
              <i class="bi bi-play-circle"></i>
              <a href="#" class="glightbox stretched-link">Watch Video</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection