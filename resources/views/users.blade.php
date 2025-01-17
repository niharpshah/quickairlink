@extends('index')
@section('content')
        <!-- ====== Contact Start ====== -->
        <section id="contact" class="ud-contact">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-xl-8 col-lg-7">
                  <div class="ud-contact-content-wrapper">
                    <div class="ud-contact-title">
                      <span>CONTACT US</span>
                      <h2>
                        Let’s talk about <br />
                        Love to hear from you!
                      </h2>
                    </div>
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
                </div>
                <div class="col-xl-4 col-lg-5">
                  <div class="ud-contact-form-wrapper wow fadeInUp" data-wow-delay=".2s">
                    <h3 class="ud-contact-form-title">Send us a Message</h3>
                    <form class="ud-contact-form" method="POST" action="{{ route('user.save') }}">
                        @csrf
                      <div class="ud-form-group">
                        <label for="userName">Full Name</label>
                        <input type="text" name="userName" id="userName" placeholder="Enter Your Name"/>
                        <span class="text-danger">
                        @error('userName')
                            {{ $message }}
                        @enderror
                    </span>
                      </div>
                      <div class="ud-form-group">
                        <label for="userEmail">Email</label>
                        <input type="text" name="userEmail" id="userEmail" placeholder="Enter Your Email"/>
                        <span class="text-danger">
                        @error('userEmail')
                            {{ $message }}
                        @enderror
                    </span>
                      </div>
                      <div class="ud-form-group">
                        <label for="userPhone">Phone</label>
                        <input type="text" name="userPhone" id="userPhone" placeholder="Enter Your Phone"/>
                        <span class="text-danger">
                        @error('userPhone')
                            {{ $message }}
                        @enderror
                    </span>
                      </div>
                      <div class="ud-form-group">
                        <label for="userNOP">Travellers</label>
                        <input type="number" name="userNOP" id="userNOP" placeholder="Enter Your Name" max="4"/>
                        <span class="text-danger">
                        @error('userNOP')
                            {{ $message }}
                        @enderror
                    </span>
                      </div>
                      <div class="ud-form-group mb-0">
                        <button type="submit" class="ud-main-btn">Review your booking and pay</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- ====== Contact End ====== -->

@endsection
