@extends('index')
@section('content')
    <!-- ====== Blog Start ====== -->
    <section class="ud-blog-grids">
        <div class="container">
          <div class="row">
            <div>
              <div class="ud-single-blog">
                <div class="ud-blog-image">
                  <a href="blog-details.html">
                    <img src="assets/images/blog/blog-01.jpg" alt="blog" />
                  </a>
                </div>
                <div class="ud-blog-content">
                  <span class="ud-blog-date">Dec 22, 2023</span>
                  <h3 class="ud-blog-title">
                    <a href="blog-details.html">
                      Meet AutoManage, the best AI management tools
                    </a>
                  </h3>
                  <p class="ud-blog-desc">
                    <p>Pickup: {{ $booking['pickup_location'] }}</p>
                    <p>Dropoff: {{ $booking['dropoff_location'] }}</p>
                    <p>Date: {{ $booking['date'] }}</p>
                    <p>Time: {{ $booking['time'] }}</p>
                    <p>Name: {{ $booking['name'] }}</p>
                    <p>Email: {{ $booking['email'] }}</p>
                    <p>Phone: {{ $booking['phone'] }}</p>
                    <p>Travelers: {{ $booking['nop'] }}</p>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- ====== Blog End ====== -->
@endsection
