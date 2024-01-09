@extends('layouts.frontend')

@section('content')
<!--==================== HOME ====================-->
<section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <section class="islands swiper-slide">
              <img
                src="{{ asset('frontend/assets/img/puncak-7.jpg') }}"
                alt=""
                class="islands__bg"/>

              <div class="islands__container container">
                <div class="islands__data">
                  <h2 class="islands__subtitle">Bukit Cendana</h2>
                  <h1 class="islands__title">About</h1>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>

      <!-- About -->
      <section class="blog section" id="blog">
        <div class="blog__container container">
          <span class="section__subtitle" style="text-align: center">All About</span>
          <h2 class="section__title" style="text-align: center">
            Informasi Tentang Kami
          </h2>

          <div class="blog__content grid">
            @foreach($abouts as $about)
                <article class="blog__card">
                <div class="blog__image">
                    <img src="{{ Storage::url($about->image) }}" alt="" class="blog__img" />
                    <a href="{{ route('about.show',$about->slug) }}" class="blog__button">
                    <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>

                <div class="blog__data">
                    <h2 class="blog__title">{{ $about->title }}</h2>
                    <p class="blog__description">
                        {{ $about->excerpt }}
                    </p>

                    <div class="blog__footer">
                    <div class="blog__reaction">{{ date('d M Y', strtotime($about->created_at)) }}</div>
                    <div class="blog__reaction">
                        <i class="bx bx-show"></i>
                        <span>{{ $about->reads }}</span>
                    </div>
                    </div>
                </div>
                </article>
            @endforeach
          </div>
        </div>
      </section>
@endsection