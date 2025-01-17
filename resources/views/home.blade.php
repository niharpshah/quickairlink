@extends('index')
@section('content')

    <!-- ====== Hero Start ====== -->
    <section class="ud-hero" id="home">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
                <h1 class="ud-hero-title">
                  Open-Source Web Template for SaaS, Startup, Apps, and More
                </h1>
                <p class="ud-hero-desc">
                  Multidisciplinary Web Template Built with Your Favourite
                  Technology - HTML Bootstrap, Tailwind and React NextJS.
                </p>
                <ul class="ud-hero-buttons">
                  <li>
                    <a href="https://links.uideck.com/play-bootstrap-download" rel="nofollow noopener" target="_blank" class="ud-main-btn ud-white-btn">
                      Download Now
                    </a>
                  </li>
                  <li>
                    <a href="https://github.com/uideck/play-bootstrap" rel="nofollow noopener" target="_blank" class="ud-main-btn ud-link-btn">
                      Learn More <i class="lni lni-arrow-right"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div
                class="ud-hero-brands-wrapper wow fadeInUp"
                data-wow-delay=".3s"
              >
                <img src="assets/images/hero/brand.svg" alt="brand" />
              </div>
              <div class="ud-hero-image wow fadeInUp" data-wow-delay=".25s">
                <img src="assets/images/hero/hero-image.svg" alt="hero-image" />
                <img
                  src="assets/images/hero/dotted-shape.svg"
                  alt="shape"
                  class="shape shape-1"
                />
                <img
                  src="assets/images/hero/dotted-shape.svg"
                  alt="shape"
                  class="shape shape-2"
                />
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ====== Hero End ====== -->

      <!-- ====== Contact Start ====== -->
      <section id="contact" class="ud-contact">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div id="map"></div>
                <div class="ud-contact-info-wrapper">
                    <div class="ud-single-info">
                      <div class="ud-info-icon">
                        <i class="lni lni-map-marker"></i>
                      </div>
                      <div class="ud-info-meta">
                        <h5>Our Location</h5>
                        <p>401 Broadway, 24th Floor, Orchard Cloud View, London</p>
                      </div>
                    </div>
                    <div class="ud-single-info">
                      <div class="ud-info-icon">
                        <i class="lni lni-envelope"></i>
                      </div>
                      <div class="ud-info-meta">
                        <h5>How Can We Help?</h5>
                        <p>info@yourdomain.com</p>
                        <p>contact@yourdomain.com</p>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-xl-4 col-lg-5">
              <div class="ud-contact-form-wrapper wow fadeInUp" data-wow-delay=".2s">
                <h3 class="ud-contact-form-title">Send us a Message</h3>
                <form class="ud-contact-form" method="POST" action="{{ route('booking.save') }}">
                    @csrf
                  <div class="ud-form-group">
                    <label for="fullName">Pickup Location</label>
                    <input type="text" class="map-input" name="pickupLocation" id="pickupLocation"/>
                    <span class="text-danger">
                        @error('pickupLocation')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="ud-form-group">
                    <label for="email">Dropoff Location</label>
                    <input type="text" class="map-input" name="dropoffLocation" id="dropoffLocation"/>
                    <span class="text-danger">
                        @error('dropoffLocation')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="ud-form-group">
                    <label for="pickupDate">Date</label>
                    <input type="date" name="pickupDate" id="pickupDate"/>
                    <span class="text-danger">
                        @error('pickupDate')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="ud-form-group">
                    <label for="pickupTime">Time</label>
                    <input type="time" name="pickupTime" id="pickupTime"/>
                    <span class="text-danger">
                        @error('pickupTime')
                            {{ $message }}
                        @enderror
                    </span>
                  </div>
                  <div class="ud-form-group mb-0">
                    <button type="submit" class="ud-main-btn"><i class="lni lni-taxi"></i> Book Your Taxi</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ====== Contact End ====== -->

@endsection
