@extends(welcomeTheme().'layouts.app')

@section('title')
<title>News & Events — Green Earth Foundation</title>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/news.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="news-header-banner">
    <div class="container">
      <h1 class="news-banner-title">News & Events</h1>
      <div class="news-banner-crumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <span class="text-white">News</span>
      </div>
    </div>
  </section>

  <!-- ========== NEWS GRID ========== -->
  <section class="news-grid-section">
    <div class="container">
      <div class="row g-4">

        <!-- News Card 1 (Column contains only standard Bootstrap layout classes) -->
        <div class="col-lg-3 col-md-6 col-6">
          <article class="news-card-flat">
            <div class="news-card-media">
              <img src="{{asset('assets')}}/ima/campaign1.png" alt="National Tree Plantation Week 2026 Launched" class="news-card-img" />
              <div class="news-date-badge-flat">
                <span class="news-date-day-num">05</span>
                <span class="news-date-month-txt">Jul</span>
              </div>
              <span class="news-cat-tag">Plantation</span>
            </div>
            <div class="news-card-body-flat">
              <h4 class="news-card-title-flat">National Tree Plantation Week 2026 Launched</h4>
              <p class="news-card-desc-flat">
                Green Earth Foundation kicks off the National Tree Plantation Week with a goal to plant 5,000 trees in 7 days across 10 districts.
              </p>
              <a href="{{route('newsDetails')}}" class="news-read-more-btn stretched-link">
                Read More <i class="fas fa-arrow-right"></i>
              </a>
              <div class="news-card-meta-flat">
                <span class="news-card-meta-item"><i class="fas fa-user"></i> Admin</span>
                <span class="news-card-meta-item"><i class="fas fa-comment"></i> 12 Comments</span>
              </div>
            </div>
          </article>
        </div>

        <!-- News Card 2 -->
        <div class="col-lg-3 col-md-6 col-6">
          <article class="news-card-flat">
            <div class="news-card-media">
              <img src="{{asset('assets')}}/ima/campaign2.png" alt="MoU Signed with Forest Department" class="news-card-img" />
              <div class="news-date-badge-flat">
                <span class="news-date-day-num">28</span>
                <span class="news-date-month-txt">Jun</span>
              </div>
              <span class="news-cat-tag">Partnership</span>
            </div>
            <div class="news-card-body-flat">
              <h4 class="news-card-title-flat">MoU Signed with Forest Department</h4>
              <p class="news-card-desc-flat">
                A landmark agreement signed with the Bangladesh Forest Department to jointly combat illegal logging and reforest degraded hill tracts.
              </p>
              <a href="{{route('newsDetails')}}" class="news-read-more-btn stretched-link">
                Read More <i class="fas fa-arrow-right"></i>
              </a>
              <div class="news-card-meta-flat">
                <span class="news-card-meta-item"><i class="fas fa-user"></i> Admin</span>
                <span class="news-card-meta-item"><i class="fas fa-comment"></i> 8 Comments</span>
              </div>
            </div>
          </article>
        </div>

        <!-- News Card 3 -->
        <div class="col-lg-3 col-md-6 col-6">
          <article class="news-card-flat">
            <div class="news-card-media">
              <img src="{{asset('assets')}}/ima/slider3.webp" alt="Green Earth Wins National Environment Award" class="news-card-img" />
              <div class="news-date-badge-flat">
                <span class="news-date-day-num">20</span>
                <span class="news-date-month-txt">Jun</span>
              </div>
              <span class="news-cat-tag">Award</span>
            </div>
            <div class="news-card-body-flat">
              <h4 class="news-card-title-flat">Green Earth Wins National Environment Award</h4>
              <p class="news-card-desc-flat">
                Honored with the National Environment Award 2026 for outstanding contributions to forest conservation and community engagement.
              </p>
              <a href="{{route('newsDetails')}}" class="news-read-more-btn stretched-link">
                Read More <i class="fas fa-arrow-right"></i>
              </a>
              <div class="news-card-meta-flat">
                <span class="news-card-meta-item"><i class="fas fa-user"></i> Admin</span>
                <span class="news-card-meta-item"><i class="fas fa-comment"></i> 24 Comments</span>
              </div>
            </div>
          </article>
        </div>

        <!-- News Card 4 -->
        <div class="col-lg-3 col-md-6 col-6">
          <article class="news-card-flat">
            <div class="news-card-media">
              <img src="{{asset('assets')}}/ima/campaign4.png" alt="Community Cleanup Drive Cleans 5 Tons of Waste" class="news-card-img" />
              <div class="news-date-badge-flat">
                <span class="news-date-day-num">12</span>
                <span class="news-date-month-txt">Jun</span>
              </div>
              <span class="news-cat-tag">Cleanup</span>
            </div>
            <div class="news-card-body-flat">
              <h4 class="news-card-title-flat">Community Cleanup Drive Cleans 5 Tons of Waste</h4>
              <p class="news-card-desc-flat">
                Hundreds of local volunteers gathered along the Buriganga riverbank to clean up plastic waste and restore biodiversity.
              </p>
              <a href="{{route('newsDetails')}}" class="news-read-more-btn stretched-link">
                Read More <i class="fas fa-arrow-right"></i>
              </a>
              <div class="news-card-meta-flat">
                <span class="news-card-meta-item"><i class="fas fa-user"></i> Admin</span>
                <span class="news-card-meta-item"><i class="fas fa-comment"></i> 15 Comments</span>
              </div>
            </div>
          </article>
        </div>

        <!-- News Card 5 -->
        <div class="col-lg-3 col-md-6 col-6">
          <article class="news-card-flat">
            <div class="news-card-media">
              <img src="{{asset('assets')}}/ima/campaign3.png" alt="Green School Program Reaches 50 Schools" class="news-card-img" />
              <div class="news-date-badge-flat">
                <span class="news-date-day-num">02</span>
                <span class="news-date-month-txt">Jun</span>
              </div>
              <span class="news-cat-tag">Education</span>
            </div>
            <div class="news-card-body-flat">
              <h4 class="news-card-title-flat">Green School Program Reaches 50 Schools</h4>
              <p class="news-card-desc-flat">
                Expanding our environmental curriculum to educate the next generation of eco-warriors about climate change and waste separation.
              </p>
              <a href="{{route('newsDetails')}}" class="news-read-more-btn stretched-link">
                Read More <i class="fas fa-arrow-right"></i>
              </a>
              <div class="news-card-meta-flat">
                <span class="news-card-meta-item"><i class="fas fa-user"></i> Admin</span>
                <span class="news-card-meta-item"><i class="fas fa-comment"></i> 5 Comments</span>
              </div>
            </div>
          </article>
        </div>

        <!-- News Card 6 -->
        <div class="col-lg-3 col-md-6 col-6">
          <article class="news-card-flat">
            <div class="news-card-media">
              <img src="{{asset('assets')}}/ima/project2.png" alt="Sundarbans Wildlife Monitoring System Installed" class="news-card-img" />
              <div class="news-date-badge-flat">
                <span class="news-date-day-num">25</span>
                <span class="news-date-month-txt">May</span>
              </div>
              <span class="news-cat-tag">Wildlife</span>
            </div>
            <div class="news-card-body-flat">
              <h4 class="news-card-title-flat">Sundarbans Wildlife Monitoring System Installed</h4>
              <p class="news-card-desc-flat">
                Deploying AI-powered camera traps to track tiger populations and prevent illegal poaching in the mangrove forests.
              </p>
              <a href="{{route('newsDetails')}}" class="news-read-more-btn stretched-link">
                Read More <i class="fas fa-arrow-right"></i>
              </a>
              <div class="news-card-meta-flat">
                <span class="news-card-meta-item"><i class="fas fa-user"></i> Admin</span>
                <span class="news-card-meta-item"><i class="fas fa-comment"></i> 19 Comments</span>
              </div>
            </div>
          </article>
        </div>

      </div>

      <!-- ========== PAGINATION ========== -->
      <div class="news-pagination-container">
        <ul class="news-pagination-list">
          <li class="news-pagination-item">
            <a href="#" class="news-pagination-link disabled" aria-label="Previous">
              <i class="fas fa-chevron-left"></i>
            </a>
          </li>
          <li class="news-pagination-item active">
            <a href="#" class="news-pagination-link">1</a>
          </li>
          <li class="news-pagination-item">
            <a href="#" class="news-pagination-link">2</a>
          </li>
          <li class="news-pagination-item">
            <a href="#" class="news-pagination-link">3</a>
          </li>
          <li class="news-pagination-item">
            <a href="#" class="news-pagination-link" aria-label="Next">
              <i class="fas fa-chevron-right"></i>
            </a>
          </li>
        </ul>
      </div>

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
