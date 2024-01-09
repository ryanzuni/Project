@extends('layouts.frontend')

@section('content')
<!--==================== HOME ====================-->
<section>
    <div class="swiper-container">
        <div>
            <!--========== ISLANDS 1 ==========-->
            <section class="islands">
                <img
                    src="{{ asset('frontend/assets/img/bumper-4.jpg') }}"
                    alt=""
                    class="islands__bg"
                />
                <div class="bg__overlay">
                    <div class="islands__container container">
                        <div
                            class="islands__data"
                            style="z-index: 99; position: relative"
                        >
                            <h2 class="islands__subtitle">
                                Kunjungi
                            </h2>
                            <h1 class="islands__title">
                                Bukit Cendana
                            </h1>
                            <p class="islands__description">
                                Pesawaran, Lampung.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<!--==================== POPULAR ====================-->
<section class="section" id="popular">
    <div class="container">
        <span class="section__subtitle" style="text-align: center"
            >Untuk Anda</span>
        <h2 class="section__title" style="text-align: center">
            Package List
        </h2>

        <div class="popular__container swiper">
            <div class="swiper-wrapper">
                @foreach($travel_packages as $travel_package)
                    <article class="popular__card swiper-slide">
                        <a href="{{ route('travel_package.show', $travel_package->slug) }}">
                            <img
                                src="{{ Storage::url($travel_package->galleries->first()->images) }}"
                                alt=""
                                class="popular__img"/>
                            <div class="popular__data">
                                <h2 class="popular__price">
                                    <span>Rp</span>{{ number_format($travel_package->price,2) }}
                                </h2>
                                <h3 class="popular__title">
                                    {{ $travel_package->location}}
                                </h3>
                                <p class="popular__description">{{ $travel_package->type }}</p>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>

            <div class="swiper-button-next">
                <i class="bx bx-chevron-right"></i>
            </div>
            <div class="swiper-button-prev">
                <i class="bx bx-chevron-left"></i>
            </div>
        </div>
    </div>
</section>

<!--==================== VALUE ====================-->
<section class="value section" id="value">
    <div class="value__container container grid">
        <div class="value__content">
            <div class="value__data">
                <span class="section__subtitle">Kenapa Harus Mengunjungi Kami?</span>
                <h2 class="section__title">
                    Pengalaman Yang Tidak Akan Kamu Temui Dimanapun
                </h2>
                <p class="value__description">
                    Beberapa Fasilitas & Acara Yang Pernah Diselenggarakan Di Bukit Cendana Harapan Jaya Lampung
                </p>
            </div>

            <div class="value__accordion">
                <div class="value__accordion-item">
                    <header class="value__accordion-header">
                        <i class="bx bxs-check-square value-accordion-icon"></i>
                        <h3 class="value__accordion-title">
                            Musholla
                        </h3>
                    </header>
                </div>

                <div class="value__accordion-item">
                    <header class="value__accordion-header">
                        <i class="bx bxs-check-square value-accordion-icon"></i>
                        <h3 class="value__accordion-title">
                            Wc & Kamar Mandi
                        </h3>
                    </header>
                </div>

                <div class="value__accordion-item">
                    <header class="value__accordion-header">
                        <i class="bx bxs-check-square value-accordion-icon"></i>
                        <h3 class="value__accordion-title">
                            Kantin(Kedai Warung)
                        </h3>
                    </header>
                </div>

                <div class="value__accordion-item">
                    <header class="value__accordion-header">
                        <i class="bx bxs-check-square value-accordion-icon"></i>
                        <h3 class="value__accordion-title">
                            Acara Gathering & Outbound
                        </h3>
                    </header>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About -->
<section class="blog section" id="blog">
    <div class="blog__container container">
        <span class="section__subtitle" style="text-align: center">Paling Bagus</span>
        <h2 class="section__title" style="text-align: center">
            Rekomendasi Untuk Anda
        </h2>

        <div class="blog__content grid">
            @foreach($abouts as $about)
                <article class="blog__card">
                    <div class="blog__image">
                        <img
                            src="{{ Storage::url($about->image) }}"
                            alt=""
                            class="blog__img"
                        />
                        <a href="{{ route('about.show', $about->slug) }}" class="blog__button">
                            <i class="bx bx-right-arrow-alt"></i>
                        </a>
                    </div>

                    <div class="blog__data">
                        <h2 class="blog__title">
                            {{ $about->title }}
                        </h2>
                        <p class="blog__description">
                            {{ $about->excerpt }}
                        </p>

                        <div class="blog__footer">
                            <div class="blog__reaction">
                                {{ date('d M Y', strtotime($about->created_at)) }}
                            </div>
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