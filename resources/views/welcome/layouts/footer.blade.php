<!-- ========== FOOTER ========== -->
<footer id="contact" class="footer-section-flat">
  <div class="container">
    <div class="row g-4">
      <!-- About Column -->
      <div class="col-lg-3 col-md-6">
        <div class="footer-brand-logo-row">
          <img src="{{asset('assets/ima/logo.webp')}}" alt="BREPRS Logo" class="footer-brand-logo-img" />
        </div>
        <p class="footer-intro-desc-flat">
          Bangladesh River Environment Protection Rights Society is a non-governmental, non-profitable, non-political, voluntary, and charitable organization dedicated to environmental and social welfare.
        </p>
        <div class="footer-social-row">
          <a href="{{general()->facebook_link ?: '#'}}" class="footer-social-link-item" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="{{general()->twitter_link ?: '#'}}" class="footer-social-link-item" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="{{general()->instagram_link ?: '#'}}" class="footer-social-link-item" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="{{general()->youtube_link ?: '#'}}" class="footer-social-link-item" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
          <a href="{{general()->linkedin_link ?: '#'}}" class="footer-social-link-item" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-2 col-md-6">
        <h5 class="footer-widget-title">Quick Links</h5>
        <ul class="footer-links-list-flat">
          <li><a href="{{route('about')}}"><i class="fas fa-chevron-right"></i> About Us</a></li>
          <li><a href="{{route('campaigns')}}"><i class="fas fa-chevron-right"></i> Campaigns</a></li>
          <li><a href="{{route('projects')}}"><i class="fas fa-chevron-right"></i> Projects</a></li>
          <li><a href="{{route('stories')}}"><i class="fas fa-chevron-right"></i> Success Stories</a></li>
          <li><a href="{{route('news')}}"><i class="fas fa-chevron-right"></i> Latest News</a></li>
          <li><a href="{{route('volunteer')}}"><i class="fas fa-chevron-right"></i> Join as Volunteer</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="col-lg-3 col-md-6">
        <h5 class="footer-widget-title">Contact Info</h5>
        <div class="footer-contact-row">
          <div class="footer-contact-icon-box">
            <i class="fas fa-map-marker-alt"></i>
          </div>
          <div class="footer-contact-details-wrap">
            <p>{{general()->address_one}}</p>
            @if(general()->address_two)
            <p class="mt-2">{{general()->address_two}}</p>
            @endif
          </div>
        </div>
        <div class="footer-contact-row">
          <div class="footer-contact-icon-box">
            <i class="fas fa-phone-alt"></i>
          </div>
          <div class="footer-contact-details-wrap">
            <p><a href="tel:{{general()->mobile}}">{{general()->mobile}}</a></p>
          </div>
        </div>
        <div class="footer-contact-row">
          <div class="footer-contact-icon-box">
            <i class="fas fa-envelope"></i>
          </div>
          <div class="footer-contact-details-wrap">
            <p><a href="mailto:{{general()->email}}">{{general()->email}}</a></p>
          </div>
        </div>
      </div>

      <!-- Newsletter -->
      <div class="col-lg-4 col-md-6">
        <h5 class="footer-widget-title">Newsletter</h5>
        <p class="footer-newsletter-text-flat">
          Subscribe to get the latest updates on our campaigns, events, and ways
          you can help protect the environment.
        </p>
        <form class="footer-newsletter-form-flat" action="{{route('subscribe')}}" method="POST">
          @csrf
          <input type="email" name="email" class="footer-newsletter-input-flat" placeholder="Enter your email" required />
          <button type="submit" class="footer-newsletter-submit-btn" aria-label="Subscribe">
            <i class="fas fa-paper-plane"></i>
          </button>
        </form>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom-bar-flat">
      <p class="footer-bottom-copy-text">
        &copy; {{date('Y')}} <a href="{{route('index')}}">BREPRS</a>. All Rights Reserved.
        | Developed by <a href="https://natoreit.com/" target="_blank" rel="noopener noreferrer">Natore IT</a>
      </p>
    </div>
  </div>
</footer>
