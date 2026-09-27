@extends(welcomeTheme().'layouts.app')

@section('title')
<title>President & CEO Profile — Bangladesh River Environment Protection Rights Society</title>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/ceo.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="ceo-header-banner">
    <div class="container">
      <h1 class="ceo-banner-title">President &amp; CEO Profile</h1>
      <div class="ceo-banner-crumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <a href="{{route('about')}}">About Us</a>
        <span>/</span>
        <span class="text-white">President Profile</span>
      </div>
    </div>
  </section>

  <main>
    <!-- ========== EXECUTIVE HERO PROFILE SECTION ========== -->
    <section class="ceo-hero-section">
      <div class="container">
        <div class="row align-items-stretch">
          <!-- Left Media Column -->
          <div class="col-lg-5 col-md-12 mb-4 mb-lg-0">
            <div class="ceo-profile-card">
              <div class="ceo-media-box">
                <img src="{{asset('assets')}}/ima/chairman.webp" alt="Md. Robiul Islam (Robi)" class="ceo-profile-img" />
                <span class="ceo-badge-tag">
                  <i class="fas fa-award me-1"></i> Executive Leader
                </span>
              </div>
              <div class="ceo-quick-info-wrap">
                <ul class="ceo-quick-info-list">
                  <li class="ceo-quick-info-item">
                    <i class="fas fa-user-shield"></i>
                    <span><strong>Position:</strong> President &amp; Chairman</span>
                  </li>
                  <li class="ceo-quick-info-item">
                    <i class="fas fa-building"></i>
                    <span><strong>Organization:</strong> BREPRS</span>
                  </li>
                  <li class="ceo-quick-info-item">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:info@breprs.org">info@breprs.org</a>
                  </li>
                  <li class="ceo-quick-info-item">
                    <i class="fas fa-phone-alt"></i>
                    <a href="tel:+8801721338925">+880 1721-338925</a>
                  </li>
                  <li class="ceo-quick-info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>2, R.K. Mission Road, Wari, Dhaka</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Right Bio Column -->
          <div class="col-lg-7 col-md-12">
            <div class="ceo-bio-wrapper">
              <span class="ceo-sec-subtitle">PRESIDENT &amp; FOUNDER VISION</span>
              <h2 class="ceo-main-name">Md. Robiul Islam (Robi)</h2>
              <p class="ceo-designation-title">
                President &amp; Chairman — Bangladesh River Environment Protection Rights Society
              </p>

              <div class="ceo-quote-card">
                <p class="ceo-quote-text">
                  <i class="fas fa-quote-left me-2 text-success"></i>
                  "নদী আমাদের জীবন, পরিবেশ আমাদের অস্তিত্ব। নদীকে রক্ষা করা মানে আমাদের ভবিষ্যৎ প্রজন্মের জন্য একটি নিরাপদ, সবুজ ও বাসযোগ্য বাংলাদেশ গড়ে তোলা।"
                </p>
              </div>

              <p class="ceo-sec-desc">
                Md. Robiul Islam (Robi) is a prominent business magnate, environmental advocate, civil rights leader,
                and philanthropist in Bangladesh. Serving as the President and Chairman of Bangladesh River Environment
                Protection Rights Society (BREPRS), he has spearheaded nationwide campaigns for river restoration,
                environmental conservation, and social welfare.
              </p>

              <div class="ceo-stats-container">
                <div class="ceo-stat-card">
                  <div class="ceo-stat-number">25+</div>
                  <div class="ceo-stat-text">Leadership Roles</div>
                </div>
                <div class="ceo-stat-card">
                  <div class="ceo-stat-number">1st Class</div>
                  <div class="ceo-stat-text">Govt. Contractor</div>
                </div>
                <div class="ceo-stat-card">
                  <div class="ceo-stat-number">Multi-Sector</div>
                  <div class="ceo-stat-text">Business &amp; NGO</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ========== OFFICIAL CHAIRMAN'S MESSAGE SECTION (চেয়ারম্যানের বাণী) ========== -->
    <section class="ceo-msg-sec" id="chairman-message">
      <div class="container">
        <div class="ceo-msg-card">
          <div class="row align-items-stretch g-4">
            <!-- Left Message Content Column -->
            <div class="col-lg-8 col-md-7 order-lg-1 order-2">
              <div class="ceo-msg-content-wrapper">
                <div class="ceo-msg-header">
                  <span class="ceo-msg-subtitle">CHAIRMAN'S MESSAGE</span>
                  <h3 class="ceo-msg-title">চেয়ারম্যানের বাণী</h3>
                  <div class="ceo-msg-line"></div>
                </div>

                <div class="ceo-msg-body">
                  <p class="ceo-msg-salutation">প্রিয় দেশবাসী,</p>
                  <p class="ceo-msg-greeting">আসসালামু আলাইকুম।</p>

                  <p class="ceo-msg-p">
                    নদী আমাদের জীবন, পরিবেশ আমাদের অস্তিত্ব। নদীকে রক্ষা করা মানে আমাদের ভবিষ্যৎ প্রজন্মের জন্য একটি নিরাপদ, সবুজ ও বাসযোগ্য বাংলাদেশ গড়ে তোলা। কিন্তু দুঃখজনকভাবে নদী দখল, দূষণ, অবৈধ বালু উত্তোলন এবং পরিবেশ ধ্বংসের কারণে আমাদের প্রাকৃতিক সম্পদ আজ হুমকির মুখে।
                  </p>

                  <p class="ceo-msg-p">
                    বাংলাদেশ নদী পরিবেশ রক্ষা অধিকার সোসাইটি দেশের নদী, জলাভূমি ও পরিবেশ সংরক্ষণে বৃক্ষ রোপণ, জনসচেতনতা সৃষ্টি, আইনি সহায়তা, সামাজিক উদ্যোগ এবং পরিবেশবান্ধব কার্যক্রম পরিচালনার মাধ্যমে একটি সুস্থ ও টেকসই সমাজ গঠনে কাজ করে যাচ্ছে।
                  </p>

                  <p class="ceo-msg-p">
                    আমি বিশ্বাস করি, সরকারের পাশাপাশি নাগরিক সমাজ, তরুণ প্রজন্ম এবং সকল সচেতন মানুষের সম্মিলিত প্রচেষ্টায় আমরা আমাদের নদী ও পরিবেশকে রক্ষা করতে সক্ষম হব। আসুন, আমরা সবাই মিলে প্রকৃতি ও পরিবেশ সংরক্ষণের এই মহৎ উদ্যোগে অংশগ্রহণ করি এবং আগামী প্রজন্মের জন্য একটি সবুজ, সুন্দর, নিরাপদ ও বাসযোগ্য বাংলাদেশ উপহার দিই।
                  </p>

                  <p class="ceo-msg-closing">সবার সহযোগিতা, আন্তরিকতা ও দোয়া কামনা করছি।</p>
                </div>

                <div class="ceo-msg-footer">
                  <div class="ceo-msg-sign-box">
                    <span class="ceo-msg-thanks">ধন্যবাদান্তে</span>
                    <h4 class="ceo-msg-name">মো: রবিউল ইসলাম রবি</h4>
                    <span class="ceo-msg-desig">চেয়ারম্যান</span>
                    <p class="ceo-msg-org">বাংলাদেশ নদী পরিবেশ রক্ষা অধিকার সোসাইটি</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Right Portrait Column -->
            <div class="col-lg-4 col-md-5 text-center order-lg-2 order-1">
              <div class="ceo-msg-portrait-wrapper">
                <div class="ceo-msg-image-frame">
                  <img src="{{asset('assets')}}/ima/chairman.webp" alt="মো: রবিউল ইসলাম রবি - চেয়ারম্যান" class="ceo-msg-portrait-img" />
                </div>
                <div class="ceo-msg-badge">
                  <i class="fas fa-quote-left me-1"></i> চেয়ারম্যানের বাণী
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ========== DETAILED ROLES & AFFILIATIONS SECTION ========== -->
    <section class="ceo-portfolio-section">
      <div class="container">
        <div class="ceo-sec-header-wrap">
          <span class="ceo-sec-subtitle">PORTFOLIO &amp; AFFILIATIONS</span>
          <h2 class="ceo-sec-title">Executive Positions &amp; Leadership Roles</h2>
          <p class="ceo-sec-desc">
            Explore the comprehensive leadership portfolio of Md. Robiul Islam (Robi) across environmental welfare,
            commercial enterprises, trade guilds, media networks, and civic organizations.
          </p>
        </div>

        <!-- Quick Summary Metric Row -->
        <div class="row g-3 mb-5 justify-content-center">
          <div class="col-lg-2 col-md-4 col-6">
            <div class="ceo-metric-summary-card">
              <div class="ceo-metric-icon">
                <i class="fas fa-th-large"></i>
              </div>
              <span class="ceo-metric-num">26</span>
              <h5 class="ceo-metric-label">All Portfolios</h5>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="ceo-metric-summary-card">
              <div class="ceo-metric-icon">
                <i class="fas fa-leaf"></i>
              </div>
              <span class="ceo-metric-num">5</span>
              <h5 class="ceo-metric-label">Environment &amp; Social</h5>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="ceo-metric-summary-card">
              <div class="ceo-metric-icon">
                <i class="fas fa-industry"></i>
              </div>
              <span class="ceo-metric-num">8</span>
              <h5 class="ceo-metric-label">Industrial &amp; Holdings</h5>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="ceo-metric-summary-card">
              <div class="ceo-metric-icon">
                <i class="fas fa-store"></i>
              </div>
              <span class="ceo-metric-num">6</span>
              <h5 class="ceo-metric-label">Trade &amp; Merchants</h5>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="ceo-metric-summary-card">
              <div class="ceo-metric-icon">
                <i class="fas fa-newspaper"></i>
              </div>
              <span class="ceo-metric-num">7</span>
              <h5 class="ceo-metric-label">Media &amp; Civic</h5>
            </div>
          </div>
        </div>

        <!-- CATEGORY 1: ENVIRONMENT, RIGHTS & SOCIAL WELFARE -->
        <div class="ceo-category-block">
          <div class="ceo-category-block-header">
            <div class="ceo-cat-title-wrap">
              <div class="ceo-cat-title-icon">
                <i class="fas fa-leaf"></i>
              </div>
              <h3 class="ceo-cat-block-title">Environment, Rights &amp; Social Welfare</h3>
            </div>
            <span class="ceo-cat-count-badge">5 Organizations</span>
          </div>

          <div class="row g-4">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-env-theme">
                    <i class="fas fa-leaf"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-gold">President / Chairman</span>
                </div>
                <h4 class="ceo-role-org-name">Bangladesh River Environment Protection Right Society</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-globe-asia text-success"></i> Environmental Conservation &amp; Water Rights
                  Foundation
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-env-theme">
                    <i class="fas fa-balance-scale"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-primary">Chairman</span>
                </div>
                <h4 class="ceo-role-org-name">World Civil Rights, Law &amp; Peace Foundation</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-shield-alt text-primary"></i> Human Rights &amp; Legal Advocacy
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-env-theme">
                    <i class="fas fa-gavel"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-secondary">Senior Vice Chairman</span>
                </div>
                <h4 class="ceo-role-org-name">Bangladesh Legal and Human Right Services Foundation</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-user-friends text-success"></i> Legal Aid &amp; Social Justice
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-env-theme">
                    <i class="fas fa-fish"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-secondary">Senior Vice Chairman</span>
                </div>
                <h4 class="ceo-role-org-name">Bangladesh Fisherman Federation</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-water text-info"></i> Fishermen &amp; Aquatic Community Rights
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-env-theme">
                    <i class="fas fa-taxi"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-primary">Chairman</span>
                </div>
                <h4 class="ceo-role-org-name">Bangladesh CNG, Auto Rickshaw, Light Vehicle Driver - Malik Welfare
                  Society</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-car text-warning"></i> Transport Workers &amp; Owners Welfare
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- CATEGORY 2: COMMERCIAL & INDUSTRIAL HOLDINGS -->
        <div class="ceo-category-block">
          <div class="ceo-category-block-header">
            <div class="ceo-cat-title-wrap">
              <div class="ceo-cat-title-icon">
                <i class="fas fa-industry"></i>
              </div>
              <h3 class="ceo-cat-block-title">Commercial &amp; Industrial Holdings</h3>
            </div>
            <span class="ceo-cat-count-badge">8 Companies</span>
          </div>

          <div class="row g-4">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-ind-theme">
                    <i class="fas fa-briefcase"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-gold">Proprietor</span>
                </div>
                <h4 class="ceo-role-org-name">M/S Beauty Enterprise</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-certificate text-warning"></i> Govt. 1st Class (Combined) Contractor &amp; Supplier,
                  Importer-Exporter &amp; Manpower Outsourcing
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-ind-theme">
                    <i class="fas fa-building"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-gold">Proprietor</span>
                </div>
                <h4 class="ceo-role-org-name">Beauty Super Market</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-store-alt text-secondary"></i> Commercial Retail &amp; Real Estate Infrastructure
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-ind-theme">
                    <i class="fas fa-cubes"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-gold">Proprietor</span>
                </div>
                <h4 class="ceo-role-org-name">K.B. Bricks</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-hammer text-dark"></i> Manufacturing &amp; Building Materials
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-ind-theme">
                    <i class="fas fa-industry"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-primary">Managing Director</span>
                </div>
                <h4 class="ceo-role-org-name">Beauty Rubber and Tire Factory Ltd.</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-cog text-primary"></i> Industrial Manufacturing
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-ind-theme">
                    <i class="fas fa-scroll"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-dark">Director</span>
                </div>
                <h4 class="ceo-role-org-name">Al-Basra Textile Mills Ltd.</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-layer-group text-muted"></i> Textile Manufacturing Industry
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-ind-theme">
                    <i class="fas fa-wine-glass-alt"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-dark">Director</span>
                </div>
                <h4 class="ceo-role-org-name">Al Basra Glass Factory Ltd.</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-industry text-secondary"></i> Glassware &amp; Material Production
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-ind-theme">
                    <i class="fas fa-city"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-dark">Director</span>
                </div>
                <h4 class="ceo-role-org-name">M.R.J.B. Properties Ltd.</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-home text-success"></i> Real Estate Development &amp; Housing
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-ind-theme">
                    <i class="fas fa-piggy-bank"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-gold">President</span>
                </div>
                <h4 class="ceo-role-org-name">Beauty Multipurpose Co-operative Society Ltd.</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-coins text-warning"></i> Financial Co-operative Society
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- CATEGORY 3: TRADE & MERCHANT ASSOCIATIONS -->
        <div class="ceo-category-block">
          <div class="ceo-category-block-header">
            <div class="ceo-cat-title-wrap">
              <div class="ceo-cat-title-icon">
                <i class="fas fa-store"></i>
              </div>
              <h3 class="ceo-cat-block-title">Trade &amp; Merchant Associations</h3>
            </div>
            <span class="ceo-cat-count-badge">6 Associations</span>
          </div>

          <div class="row g-4">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-trade-theme">
                    <i class="fas fa-store"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-gold">President</span>
                </div>
                <h4 class="ceo-role-org-name">Dhaka Metropolitan Small Traders Association</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-users text-warning"></i> Capital Traders &amp; Merchants Guild
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-trade-theme">
                    <i class="fas fa-shopping-basket"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-gold">President</span>
                </div>
                <h4 class="ceo-role-org-name">Jatrabari Thana Small Traders Association</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-shopping-bag text-danger"></i> Local Merchant Welfare Guild
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-trade-theme">
                    <i class="fas fa-apple-alt"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-gold">President</span>
                </div>
                <h4 class="ceo-role-org-name">Greater Uttara Bismillah Wholesale Kancha Bazar Small Traders Association
                  Ltd.</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-boxes text-success"></i> Wholesale Produce Market Association
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-trade-theme">
                    <i class="fas fa-hands-helping"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-gold">President</span>
                </div>
                <h4 class="ceo-role-org-name">Cooperative Market/Hat Traders Association</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-handshake text-info"></i> Cooperative Market Commerce
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-trade-theme">
                    <i class="fas fa-glass-cheers"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-gold">President</span>
                </div>
                <h4 class="ceo-role-org-name">Cox’s-Bay International Club Ltd.</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-crown text-warning"></i> Social &amp; Professional Club
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-trade-theme">
                    <i class="fas fa-users-cog"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-secondary">Member</span>
                </div>
                <h4 class="ceo-role-org-name">Cooperative Consortium</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-sitemap text-muted"></i> National Cooperative Body
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- CATEGORY 4: MEDIA & PROFESSIONAL ORGANIZATIONS -->
        <div class="ceo-category-block">
          <div class="ceo-category-block-header">
            <div class="ceo-cat-title-wrap">
              <div class="ceo-cat-title-icon">
                <i class="fas fa-newspaper"></i>
              </div>
              <h3 class="ceo-cat-block-title">Media &amp; Professional Organizations</h3>
            </div>
            <span class="ceo-cat-count-badge">7 Organizations</span>
          </div>

          <div class="row g-4">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-media-theme">
                    <i class="fas fa-newspaper"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-gold">President</span>
                </div>
                <h4 class="ceo-role-org-name">National Journalists' Association - Dhaka Division</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-bullhorn text-info"></i> Media &amp; Journalism Federation
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-media-theme">
                    <i class="fas fa-tv"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-primary">Chairman</span>
                </div>
                <h4 class="ceo-role-org-name">Channel 7bd Ltd.</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-broadcast-tower text-primary"></i> Broadcasting &amp; Media Network
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-media-theme">
                    <i class="fas fa-video"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-dark">Director</span>
                </div>
                <h4 class="ceo-role-org-name">Tarango Television Ltd.</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-film text-secondary"></i> Broadcast Television Channel
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-media-theme">
                    <i class="fas fa-pen-nib"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-primary">Managing Editor</span>
                </div>
                <h4 class="ceo-role-org-name">The Morning Glory</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-print text-danger"></i> Publication &amp; Press
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-media-theme">
                    <i class="fas fa-chart-line"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-secondary">Member</span>
                </div>
                <h4 class="ceo-role-org-name">Dhaka Chamber of Commerce &amp; Industry (DCCI)</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-landmark text-success"></i> National Apex Trade Organization
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-media-theme">
                    <i class="fas fa-map-marked-alt"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-secondary">Joint Secretary</span>
                </div>
                <h4 class="ceo-role-org-name">Chapai Nawabganj Zila Samiti, Dhaka</h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-map-marker-alt text-warning"></i> Regional Welfare Association
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="ceo-role-item-card">
                <div class="ceo-role-card-top">
                  <div class="ceo-role-card-icon icon-media-theme">
                    <i class="fas fa-landmark"></i>
                  </div>
                  <span class="ceo-role-badge-tag badge-secondary">Member</span>
                </div>
                <h4 class="ceo-role-org-name">Greater Rajshahi Zila Samiti (Rajshahi, Chapai Nawabganj, Natore, Naogaon)
                </h4>
                <p class="ceo-role-subdesc">
                  <i class="fas fa-compass text-info"></i> Divisional Civic Association
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Call to Action Banner -->
        <div class="row">
          <div class="col-12">
            <div class="ceo-cta-banner-wrap">
              <h3 class="ceo-cta-heading">Join Hands with Our Environmental Mission</h3>
              <p class="ceo-cta-text">
                Under the leadership of Md. Robiul Islam (Robi), Bangladesh River Environment Protection Rights Society
                invites individuals, corporate partners, and volunteers to support water rights and river preservation.
              </p>
              <a href="{{route('volunteer')}}" class="ceo-cta-action-btn">
                <i class="fas fa-hand-holding-heart"></i> Become a Partner / Volunteer
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
