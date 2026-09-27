@extends(welcomeTheme().'layouts.app')

@section('title')
<title>Contact Us — Green Earth Foundation</title>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/contact.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="contact-header-banner">
    <div class="container">
      <h1 class="contact-banner-title">Contact Us</h1>
      <div class="contact-banner-crumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <span class="text-white">Contact Us</span>
      </div>
    </div>
  </section>

  <!-- ========== CONTACT MAIN CONTENT ========== -->
  <section class="contact-main-section">
    <div class="container">
      <div class="row g-4">

        <!-- Left Column: Contact Form (No custom class in column div) -->
        <div class="col-lg-7 col-12">
          <div class="contact-form-card">
            <h2 class="contact-form-title">Get In Touch</h2>
            <p class="contact-form-subtitle">
              Have questions, feedback, or want to partner with us? Fill out the form below and we will get back to you shortly.
            </p>
            <form action="{{route('contactMail')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="contact-form-group">
                    <label for="contactFullName" class="contact-form-label">Full Name</label>
                    <input type="text" id="contactFullName" name="name" class="contact-form-control" placeholder="John Doe" required />
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="contact-form-group">
                    <label for="contactEmail" class="contact-form-label">Email Address</label>
                    <input type="email" id="contactEmail" name="email" class="contact-form-control" placeholder="john@example.com" required />
                  </div>
                </div>
              </div>
              <div class="contact-form-group">
                <label for="contactSubject" class="contact-form-label">Subject</label>
                <input type="text" id="contactSubject" name="subject" class="contact-form-control" placeholder="Inquiry about volunteering" required />
              </div>
              <div class="contact-form-group">
                <label for="contactMessage" class="contact-form-label">Message</label>
                <textarea id="contactMessage" name="message" class="contact-form-control" placeholder="Write your message here..." required></textarea>
              </div>
              <button type="submit" class="contact-form-submit-btn">
                <i class="fas fa-paper-plane"></i> Send Message
              </button>
            </form>
          </div>
        </div>

        <!-- Right Column: Contact Details (No custom class in column div) -->
        <div class="col-lg-5 col-12">
          <div class="contact-info-panel">
            
            <!-- Address Card -->
            <div class="contact-info-card">
              <div class="contact-info-icon-box">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <div class="contact-info-details">
                <h4 class="contact-info-title">Our Address</h4>
                <p class="contact-info-text">
                  {{general()->address_one}}
                  @if(general()->address_two)
                  <br />{{general()->address_two}}
                  @endif
                </p>
              </div>
            </div>

            <!-- Phone Card -->
            <div class="contact-info-card">
              <div class="contact-info-icon-box">
                <i class="fas fa-phone-alt"></i>
              </div>
              <div class="contact-info-details">
                <h4 class="contact-info-title">Phone Numbers</h4>
                <p class="contact-info-text">
                  <a href="tel:{{general()->mobile}}">{{general()->mobile}}</a>
                </p>
              </div>
            </div>

            <!-- Email Card -->
            <div class="contact-info-card">
              <div class="contact-info-icon-box">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="contact-info-details">
                <h4 class="contact-info-title">Email Addresses</h4>
                <p class="contact-info-text">
                  <a href="mailto:{{general()->email}}">{{general()->email}}</a>
                </p>
              </div>
            </div>

            <!-- Social Card -->
            <div class="contact-info-card">
              <div class="contact-info-icon-box">
                <i class="fas fa-share-alt"></i>
              </div>
              <div class="contact-info-details">
                <h4 class="contact-info-title">Follow Us</h4>
                <div class="contact-info-socials">
                  <a href="{{general()->facebook_link ?: '#'}}" class="contact-social-btn facebook" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                  <a href="{{general()->twitter_link ?: '#'}}" class="contact-social-btn twitter" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                  <a href="{{general()->instagram_link ?: '#'}}" class="contact-social-btn instagram" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                  <a href="{{general()->youtube_link ?: '#'}}" class="contact-social-btn youtube" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========== MAP SECTION ========== -->
  <section class="contact-map-section">
    <div class="contact-map-wrapper">
      <iframe
        class="contact-map-iframe"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14608.039655653457!2d90.36712398436666!3d23.7470487042562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b33c892fb7%3A0x27747ab710ef24a0!2sDhanmondi%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1717325600000!5m2!1sen!2sbd"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="Dhanmondi, Dhaka Map">
      </iframe>
    </div>
  </section>

  <!-- ========== CTA BANNER (CARD STYLE) ========== -->
  <section class="camp-details-cta-section">
    <div class="container">
      <div class="camp-details-cta-card">
        <div class="row align-items-center">
          <div class="col-lg-8 text-start text-lg-start text-center">
            <h2 class="camp-details-cta-title">Together, We Can Save Our Planet</h2>
            <p class="camp-details-cta-text">
              Join hands with us to protect forests, plant trees, clean rivers, and create a sustainable green future.
            </p>
          </div>
          <div class="col-lg-4 text-end text-lg-end text-center mt-lg-0 mt-4">
            <div class="camp-details-cta-buttons">
              <a href="{{route('volunteer')}}" class="camp-details-cta-btn-gold">
                <i class="fas fa-user-plus"></i> Become a Volunteer
              </a>
              <a href="#contact" class="camp-details-cta-btn-outline">
                <i class="fas fa-envelope"></i> Contact Us
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
