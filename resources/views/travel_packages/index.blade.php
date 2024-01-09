@extends('layouts.frontend')

@section('content')
 <!--==================== HOME ====================-->
 <section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <section class="islands swiper-slide">
              <img src="{{ asset('frontend/assets/img/bumper-19.jpg') }}" alt="" class="islands__bg" />

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
      <section class="comment-section" id="travel_package_id">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card p-3">
              <h2>Comment</h2>
              <form action="{{ route('comments.store', $travel_package->id) }}" method="POST">
                @csrf
                <div class="row">

                  <div class="col-md-6 mb-3">                           
                    <input type="text" class="form-control" placeholder="Your Name"/>
                  </div>    
                  <div class="col-md-6 mb-3">                           
                    <input type="email" class="form-control" placeholder="Your Email"/>
                  </div>
                  <div class="col-12 mb-3">
                    <textarea name="text" id="" cols="137" rows="10" class="form-control" placeholder="Message"></textarea>
                  </div>
                  </br>
                  <div class="col-0">
                    <input type="submit" value="Send Message" class="btn btn-primary"/>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</section>

@endsection