@extends('layouts.frontend')

@section('content')
 <!--==================== HOME ====================-->
 <section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <section class="islands swiper-slide">
              <img src="{{ Storage::url($about->image) }}" alt="" class="islands__bg" />

              <div class="islands__container container">
                <div class="islands__data">
                  <h2 class="islands__subtitle">{{ $about->title }}</h2>
                  <h1 class="islands__title">{{ date('d M Y',strtotime($about->created_at)) }}</h1>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>

      <!-- About -->
      <section class="blog section" id="blog">
        <div class="blog__container container">
          <div class="content__container">
            <div class="blog__detail">
              {!! $about->description !!}
              <div class="blog__footer" style="margin-top: 2rem;">
                <div class="blog__reaction">{{ date('d M Y', strtotime($about->created_at)) }}</div>
                <div class="blog__reaction">
                  <i class="bx bx-show"></i>
                  <span>{{ $about->reads }}</span>
                </div>
              </div>
            </div>
            <div class="blog">
              <h3>Favorit</h3>
              <ul>
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('about.category', $category->slug) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
              </ul>
              <h3 style="margin-bottom: 1rem">Populer</h3>
              @foreach($travel_packages as $travel_package)
                <article class="popular__card" style="margin-bottom: 1rem">
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
        </div>
      </section>

      <section class="blog" id="blog">
        <div class="blog__container container">
          <span class="section__subtitle" style="text-align: center">Related Blog</span>
          <h2 class="section__title" style="text-align: center">
            Paling Banyak Dikunjungi
          </h2>

          <div class="blog__content grid">
            @foreach($relatedAbouts as $relatedAbout)
            <article class="blog__card">
              <div class="blog__image">
                <img src="{{ Storage::url($relatedAbout->image) }}" alt="" class="blog__img" />
                <a href="{{ route('about.show', $relatedAbout->slug) }}" class="blog__button">
                  <i class="bx bx-right-arrow-alt"></i>
                </a>
              </div>

              <div class="blog__data">
                <h2 class="blog__title">{{ $relatedAbout->title }}</h2>
                <p class="blog__description">
                  {{ $relatedAbout->excerpt }}
                </p>

                <div class="blog__footer">
                  <div class="blog__reaction">{{ date('d M Y', strtotime($relatedAbout->created_at)) }}</div>
                  <div class="blog__reaction">
                    <i class="bx bx-show"></i>
                    <span>{{ $relatedAbout->reads }}</span>
                  </div>
                </div>
              </div>
            </article>
            @endforeach
          </div>
        </div>
      </section>
@endsection

@push('style-alt')
<style>
  blockquote {
    border-left: 8px solid #b4b4b4;
    padding-left: 1rem;
  }
  .blog__detail ul li {
    list-style: initial;
  }
</style>
@endpush