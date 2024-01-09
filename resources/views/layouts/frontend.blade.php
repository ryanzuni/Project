<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--=============== BOXICONS ===============-->
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />

        <!--=============== SWIPER CSS ===============-->
        <link
            rel="stylesheet"
            href="{{ asset('frontend/assets/libraries/swiper-bundle.min.css') }}"
        />

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
        @stack('style-alt')
        <title>Bukit Cendana</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="{{ route('homepage') }}" class="nav__logo">Bukit Cendana</a>

                <div class="nav__menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="{{ route('homepage') }}" class="nav__link {{ request()->is('/') ? ' active-link' : '' }}">
                                <i class="bx bx-home-alt"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('about.index') }}" class="nav__link {{ request()->is('abouts') || request()->is('abouts/*')  ? ' active-link' : '' }}">
                                <i class="bx bx-award"></i>
                                <span>About</span>
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('travel_package.index') }}" class="nav__link {{ request()->is('travel-packages') || request()->is('travel-packages/*')  ? ' active-link' : '' }}">
                                <i class="bx bx-building-house"></i>
                                <span>Package List</span>
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('contact') }}" class="nav__link {{ request()->is('contact') ? ' active-link' : '' }}">
                                <i class="bx bx-phone"></i>
                                <span>Contact</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!--==================== MAIN ====================-->
        <main class="main">
            @yield('content')
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div>
                    <a href="{{ route('homepage') }}" class="footer__logo">
                       Bukit Cendana
                    </a>
                    <p class="footer__description">
                        Desa Harapan Jaya<br/>
                        Kabupaten Pesawaran, Lampung
                    </p>
                </div>

                <div class="footer__content">
                    <div>
                        <h3 class="footer__title">Lokasi</h3>
                        <p>Hutan, Kec. Hutan,<br/> Kabupaten Pesawaran, <br/>
                        Lampung 35451.
                    </p>
                    </div>
                
                    <div>
                        <h3 class="footer__title">Jam Operasional</h3>
                        <p>Senin - Minggu (24 Jam)</p>
                    </div>   

                    <div>
                        <!--Footer Media Sosial-->
                        <h3 class="footer__title">Follow us</h3>
                        <ul class="footer__social">
                            <!--Instagram-->
                            <a href="https://www.instagram.com/bukit_cendana_lampung/" class="footer__social-link">
                                <i class="bx bxl-instagram-alt"></i>
                            </a>
                            <!--Whatsapp-->
                            <a href="https://wa.me/6285377205169" class="footer__social-link">
                                <i class="bx bxl-whatsapp"></i>
                            </a>
                            <!--Tiktok-->
                            <a href="https://www.tiktok.com/@bumpercendanapesawaran?_t=8hB5OcOD40P&_r=1" class="footer__social-link">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer__info container">
                <span class="footer__copy">
                    &#169; Bukit Cendana. All rigths reserved
                </span>
            </div>
        </footer>

        <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="bx bx-chevrons-up"></i>
        </a>

        <!--=============== SCROLLREVEAL ===============-->
        <script src="{{ asset('frontend/assets/libraries/scrollreveal.min.js') }}"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="{{ asset('frontend/assets/libraries/swiper-bundle.min.js') }}"></script>

        <!--=============== MAIN JS ===============-->
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
        @stack('script-alt')
    </body>
</html>
