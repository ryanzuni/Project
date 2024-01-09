@extends('layouts.frontend')

@section('content')
<!--==================== HOME ====================-->
<section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <!--========== ISLANDS 1 ==========-->
            <section class="islands swiper-slide">
              <img
                src="{{ asset('frontend/assets/img/bumper-8.jpg') }}"
                alt=""
                class="islands__bg"
              />
              <div class="bg__overlay">
                <div class="islands__container container">
                  <div class="islands__data">
                    <h2 class="islands__subtitle">Bukit Cendana</h2>
                    <h1 class="islands__title">Contact Us</h1>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
      <!--==================== CONTACT ====================-->
      <section class="contact section" id="contact">
        <div class="contact__container container grid">
          <!-- Peta di bagian samping kiri -->
      <section>
        <div class="map-container">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.169148550837!2d105.11022417364931!3d-5.541918755082844!
            2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e412b217da4952b%3A0x6823ec3950769090!2sCamping%20Ground%20
            Pesona%20Harapan%20Jaya!5e0!3m2!1sen!2sid!4v1698819562778!5m2!1sen!2sid" width="600" height="450" 
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </section>

          <div class="contact__content">
            <div class="contact__data">
              <span class="section__subtitle">Hubungi Kami</span>
              <h2 class="section__title">Contact Us</h2>
              <p class="contact__description">
                Hubungi Kami & Follow Sosial Media Kami
              </p>
            </div>

            <div class="contact__card">
              <div class="contact__card-box">
                <div class="contact__card-info">
                  <i class="bx bxl-instagram"></i>
                  <div>
                    <h3 class="contact__card-title">Instagram</h3>
                    <p class="contact__card-description">Bukit Cendana</p>
                  </div>
                </div>
                <a href="https://www.instagram.com/bukit_cendana_lampung/"><button class="button contact__card-button">Follow</button></a>
              </div>

              <div class="contact__card-box">
                <div class="contact__card-info">
                  <i class="bx bxl-tiktok"></i>
                  <div>
                    <h3 class="contact__card-title">Tiktok</h3>
                    <p class="contact__card-description">Bukit Cendana</p>
                  </div>
                </div>
                <a href="https://www.tiktok.com/@bumpercendanapesawaran?_t=8hB5OcOD40P&_r=1"><button class="button contact__card-button">Follow</button></a>
              </div>

              <div class="contact__card-box">
                <div class="contact__card-info">
                  <i class="bx bxl-whatsapp"></i>
                  <div>
                    <h3 class="contact__card-title">Whatsapp</h3>
                    <p class="contact__card-description">BUMPER</p>
                  </div>
                </div>
                <a href="https://wa.me/6285377205169"><button class="button contact__card-button">Chat</button></a>
              </div>

              <div class="contact__card-box">
                <div class="contact__card-info">
                  <i class="bx bxl-whatsapp"></i>
                  <div>
                    <h3 class="contact__card-title">Whatsapp</h3>
                    <p class="contact__card-description">PUNCAK</p>
                  </div>
                </div>
                <a href="https://wa.me/6281369692873"><button class="button contact__card-button">Chat</button></a>
              </div>
            </div>
          </div>
        </div>
              
@endsection

