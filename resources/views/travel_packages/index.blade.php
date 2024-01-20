@extends('layouts.frontend')

@section('content')
 <!--==================== HOME ====================-->
 <section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <section class="islands swiper-slide">
              <img src="{{ asset('frontend/assets/img/bumper-18.jpg') }}" alt="" class="islands__bg" />

              <div class="islands__container container">
                <div class="islands__data">
                  <h2 class="islands__subtitle">Bukit Cendana</h2>
                  <h1 class="islands__title">Package List</h1>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>

      <!--==================== POPULAR ====================-->
      <section class="section" id="popular">
        <div class="container">
          <span class="section__subtitle" style="text-align: center">All</span>
          <h2 class="section__title" style="text-align: center">
            Package
          </h2>

          <div class="popular__all">
            @foreach($travel_packages as $travel_package)
                <article class="popular__card">
                <a href="{{ route('travel_package.show', $travel_package->slug) }}">
                    <img
                    src="{{ Storage::url($travel_package->galleries->first()->images) }}"
                    alt=""
                    class="popular__img"
                    />
                    <div class="popular__data">
                    <h2 class="popular__price"><span>Rp</span>{{ number_format($travel_package->price,2) }}</h2>
                    <h3 class="popular__title">{{ $travel_package->location }}</h3>
                    <p class="popular__description">{{ $travel_package->type }}</p>
                    </div>
                </a>
                </article>
            @endforeach           
          </div>
        </div>
      </section>
      <!-- Comment Section -->
      <section class="blog section" id="blog">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card p-3">
            <div class="package-travel">
              <h3>Comment</h3>
              <div class="card">
                <form action="{{ route('booking.store') }}" method="post">
                  @csrf 
                  <input type="text" name="name" placeholder="Your Name" />
                  <input type="email" name="email" placeholder="Your Email"/>
                  <input type="number" name="number_phone" placeholder="Your Number" />
                  <input
                    placeholder="Pick Your Date"
                    class="textbox-n"
                    type="text"
                    name="date"
                    onfocus="(this.type='date')"
                    id="date"/>
                  <input type="text" name="message" placeholder="Your Message" />
                  <button type="submit" class="button button-booking">Send Message</button>
                </form>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
</section>

@endsection