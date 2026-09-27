@extends(welcomeTheme().'layouts.app')

@section('title')
<title>About Us — Bangladesh River Environment Protection Rights Society</title>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/about.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="about-header-banner">
    <div class="container">
      <h1 class="about-banner-title">About Our Foundation</h1>
      <div class="about-banner-crumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <span class="text-white">About Us</span>
      </div>
    </div>
  </section>

  <!-- ========== FOUNDATION IDENTITY & PROFILE SECTION ========== -->
  <section class="abt-profile-sec">
    <div class="container">
      <div class="text-center mx-auto mb-5">
        <span class="abt-sec-subtitle">FOUNDATION PROFILE</span>
        <h2 class="abt-sec-title">Bangladesh River Environment Protection Rights <span>Society</span></h2>
        <p class="abt-sec-desc mx-auto">
          We are a non-governmental, non-profitable, non-political, voluntary, and charitable organization dedicated to
          performing activities in the interest of mass people regardless of race, religion, caste, or background.
        </p>
      </div>

      <div class="row g-4">
        <!-- Identity Card 1: Name -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-profile-card">
            <div class="abt-profile-icon ic-theme-emerald">
              <i class="fas fa-building-flag"></i>
            </div>
            <div class="abt-profile-content">
              <div class="abt-profile-header">
                <h3 class="abt-profile-card-title">Name of Foundation</h3>
                <span class="abt-profile-badge">CLAUSE 01</span>
              </div>
              <p class="abt-profile-card-text">
                The name of the Foundation is <strong>Bangladesh River Environment Protection Rights Society</strong>.
              </p>
            </div>
          </div>
        </div>

        <!-- Identity Card 2: Registered Office -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-profile-card">
            <div class="abt-profile-icon ic-theme-amber">
              <i class="fas fa-location-dot"></i>
            </div>
            <div class="abt-profile-content">
              <div class="abt-profile-header">
                <h3 class="abt-profile-card-title">Registered Office Address</h3>
                <span class="abt-profile-badge">CLAUSE 02</span>
              </div>
              <p class="abt-profile-card-text">
                Situated at <strong>2, R.K. Mission Road, Wari, Dhaka, Bangladesh</strong>. Upon decision of the Board
                of the Foundation, it can be relocated anywhere in Bangladesh and abroad.
              </p>
            </div>
          </div>
        </div>

        <!-- Identity Card 3: Operational Area -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-profile-card">
            <div class="abt-profile-icon ic-theme-blue">
              <i class="fas fa-map-location-dot"></i>
            </div>
            <div class="abt-profile-content">
              <div class="abt-profile-header">
                <h3 class="abt-profile-card-title">Operational Area</h3>
                <span class="abt-profile-badge">CLAUSE 03</span>
              </div>
              <p class="abt-profile-card-text">
                Operational across <strong>all over Bangladesh</strong>. As per decision, branch offices will be opened
                anywhere nationwide and internationally.
              </p>
            </div>
          </div>
        </div>

        <!-- Identity Card 4: Objective & Purpose -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-profile-card">
            <div class="abt-profile-icon ic-theme-purple">
              <i class="fas fa-hand-holding-heart"></i>
            </div>
            <div class="abt-profile-content">
              <div class="abt-profile-header">
                <h3 class="abt-profile-card-title">Objective &amp; Purpose</h3>
                <span class="abt-profile-badge">CLAUSE 04</span>
              </div>
              <p class="abt-profile-card-text">
                A <strong>non-government, non-profitable, non-political, voluntary &amp; charitable</strong>
                organization dedicated to serving mass people regardless of race, religion, or background.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== FOUNDATIONAL OBJECTIVES SECTION ========== -->
  <section class="abt-obj-sec">
    <div class="container">
      <div class="abt-obj-header text-center">
        <span class="abt-sec-subtitle">FOUNDATIONAL OBJECTIVES</span>
        <h2 class="abt-sec-title">Key Pillars of Our <span>Mission &amp; Service</span></h2>
        <p class="abt-sec-desc mx-auto">
          Our constitution establishes 10 major action directives driving natural relief, educational empowerment,
          social justice, cultural preservation, healthcare, and inclusive human development across Bangladesh.
        </p>
      </div>

      <div class="row g-4">
        <!-- Objective 5 -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-obj-card">
            <div class="abt-obj-top-row">
              <div class="abt-obj-icon-wrap obj-ic-emerald">
                <i class="fas fa-house-flood-water"></i>
              </div>
              <span class="abt-obj-num-tag">OBJECTIVE 05</span>
            </div>
            <h3 class="abt-obj-card-title">Disaster Relief, Sanitation &amp; Pollution Prevention</h3>
            <p class="abt-obj-card-text">
              To take initiative for distribution of relief among the affected people by natural disasters/calamities,
              raise awareness about sanitation, and implement proper steps to prevent environmental pollution across
              riverine and rural regions.
            </p>
          </div>
        </div>

        <!-- Objective 6 -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-obj-card">
            <div class="abt-obj-top-row">
              <div class="abt-obj-icon-wrap obj-ic-blue">
                <i class="fas fa-user-graduate"></i>
              </div>
              <span class="abt-obj-num-tag">OBJECTIVE 06</span>
            </div>
            <h3 class="abt-obj-card-title">Education &amp; Technical Training for Disadvantaged Youth</h3>
            <p class="abt-obj-card-text">
              To train up illiterate and half-literate people for increasing their performance by ensuring advanced
              education systems &amp; news media, and arrange vocational &amp; technical training among street people
              and disadvantaged populations.
            </p>
          </div>
        </div>

        <!-- Objective 7 -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-obj-card">
            <div class="abt-obj-top-row">
              <div class="abt-obj-icon-wrap obj-ic-rose">
                <i class="fas fa-shield-halved"></i>
              </div>
              <span class="abt-obj-num-tag">OBJECTIVE 07</span>
            </div>
            <h3 class="abt-obj-card-title">Social Rights Awareness &amp; Rehabilitation</h3>
            <p class="abt-obj-card-text">
              To raise awareness among common people, poor communities, and society against Child Marriage, Child
              Labour, Child Abuse, Woman Torture, Dowry, Drug Addiction, and Terrorism, alongside executing
              comprehensive rehabilitation for affected individuals.
            </p>
          </div>
        </div>

        <!-- Objective 8 -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-obj-card">
            <div class="abt-obj-top-row">
              <div class="abt-obj-icon-wrap obj-ic-amber">
                <i class="fas fa-book-bookmark"></i>
              </div>
              <span class="abt-obj-num-tag">OBJECTIVE 08</span>
            </div>
            <h3 class="abt-obj-card-title">Folklore Manuscripts &amp; Cultural Heritage Preservation</h3>
            <p class="abt-obj-card-text">
              To collect and publish rare/old manuscripts of the lost folklore of the country including myth books, and
              arrange exhibitions of sculptures and painting collections through display centers, museums, and mobile
              museums.
            </p>
          </div>
        </div>

        <!-- Objective 9 -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-obj-card">
            <div class="abt-obj-top-row">
              <div class="abt-obj-icon-wrap obj-ic-purple">
                <i class="fas fa-palette"></i>
              </div>
              <span class="abt-obj-num-tag">OBJECTIVE 09</span>
            </div>
            <h3 class="abt-obj-card-title">Fine Arts Institutes, Museums &amp; Heritage Research</h3>
            <p class="abt-obj-card-text">
              To set up museums for displaying sculptures and paintings, establish Fine Arts institutes for organizing
              drawing competitions, publicize archaeological and historical precedents, and establish educational
              research centers.
            </p>
          </div>
        </div>

        <!-- Objective 10 -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-obj-card">
            <div class="abt-obj-top-row">
              <div class="abt-obj-icon-wrap obj-ic-teal">
                <i class="fas fa-heart-pulse"></i>
              </div>
              <span class="abt-obj-num-tag">OBJECTIVE 10</span>
            </div>
            <h3 class="abt-obj-card-title">Public Health &amp; Epidemic Awareness Programs</h3>
            <p class="abt-obj-card-text">
              To lead public health publicity and awareness campaigns for healthy living among common people, and
              execute active initiative programs for protecting the population from HIV, AIDS, and communicable health
              risks.
            </p>
          </div>
        </div>

        <!-- Objective 11 -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-obj-card">
            <div class="abt-obj-top-row">
              <div class="abt-obj-icon-wrap obj-ic-indigo">
                <i class="fas fa-people-roof"></i>
              </div>
              <span class="abt-obj-num-tag">OBJECTIVE 11</span>
            </div>
            <h3 class="abt-obj-card-title">Scientific Preservation, Women &amp; 3rd Gender Empowerment</h3>
            <p class="abt-obj-card-text">
              To collect and preserve machinery and scientific equipment while educating the public on their usefulness,
              develop women's rehabilitation centers, and provide technical education to HIZRA (3rd gender) to empower
              them in every sector.
            </p>
          </div>
        </div>

        <!-- Objective 12 -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-obj-card">
            <div class="abt-obj-top-row">
              <div class="abt-obj-icon-wrap obj-ic-cyan">
                <i class="fas fa-mosque"></i>
              </div>
              <span class="abt-obj-num-tag">OBJECTIVE 12</span>
            </div>
            <h3 class="abt-obj-card-title">Islamic Education, Religious Support &amp; Book Distribution</h3>
            <p class="abt-obj-card-text">
              To establish Mosques and Madrasas for enhancing the quality of Islamic education, and distribute free
              books and resources amongst underprivileged Alema and Olama scholars across communities.
            </p>
          </div>
        </div>

        <!-- Objective 13 -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-obj-card">
            <div class="abt-obj-top-row">
              <div class="abt-obj-icon-wrap obj-ic-emerald">
                <i class="fas fa-school"></i>
              </div>
              <span class="abt-obj-num-tag">OBJECTIVE 13</span>
            </div>
            <h3 class="abt-obj-card-title">Higher Institutions for Science, Literature &amp; Arts</h3>
            <p class="abt-obj-card-text">
              To take initiatives for enhancing knowledge of science, literature &amp; arts by establishing schools,
              colleges &amp; universities, and offering various skill-building programs tailored to age, sex, and
              profession.
            </p>
          </div>
        </div>

        <!-- Objective 14 -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="abt-obj-card">
            <div class="abt-obj-top-row">
              <div class="abt-obj-icon-wrap obj-ic-blue">
                <i class="fas fa-book-open-reader"></i>
              </div>
              <span class="abt-obj-num-tag">OBJECTIVE 14</span>
            </div>
            <h3 class="abt-obj-card-title">Public Libraries &amp; Reading Room Establishments</h3>
            <p class="abt-obj-card-text">
              To set up libraries and community reading rooms to nurture and grow reading habits among common people,
              making knowledge accessible to all strata of society.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== ENVIRONMENTAL & RIVER RIGHTS FOCUS BANNER ========== -->
  <section class="abt-focus-sec">
    <div class="container">
      <div class="abt-focus-card">
        <div class="row align-items-center">
          <div class="col-lg-8">
            <span class="abt-focus-badge">OUR COMMITMENT TO BANGLADESH</span>
            <h2 class="abt-focus-title">Protecting Rivers, Preserving Nature, and Uplifting Humanity</h2>
            <p class="abt-focus-text">
              Rivers are the lifeline of Bangladesh. Through Bangladesh River Environment Protection Rights Society, we
              combine environmental protection with social welfare, education, healthcare, and cultural preservation for
              a sustainable future.
            </p>
            <div class="abt-focus-stats-row">
              <div class="abt-focus-stat-item">
                <i class="fas fa-water abt-focus-stat-icon"></i>
                <div>
                  <span class="abt-focus-stat-val">All Over</span>
                  <span class="abt-focus-stat-lbl">Bangladesh Scope</span>
                </div>
              </div>
              <div class="abt-focus-stat-item">
                <i class="fas fa-hand-holding-heart abt-focus-stat-icon"></i>
                <div>
                  <span class="abt-focus-stat-val">100%</span>
                  <span class="abt-focus-stat-lbl">Non-Profit &amp; Voluntary</span>
                </div>
              </div>
              <div class="abt-focus-stat-item">
                <i class="fas fa-people-group abt-focus-stat-icon"></i>
                <div>
                  <span class="abt-focus-stat-val">Inclusive</span>
                  <span class="abt-focus-stat-lbl">Humanity Rights</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 text-lg-end text-center mt-lg-0 mt-4">
            <a href="{{route('contact')}}" class="btn btn-warning btn-lg px-4 py-3 fw-bold text-dark">
              <i class="fas fa-paper-plane me-2"></i> Get In Touch With Us
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== CTA BANNER SECTION ========== -->
  <section class="camp-details-cta-section">
    <div class="container">
      <div class="camp-details-cta-card">
        <div class="row align-items-center">
          <div class="col-lg-8 text-start text-lg-start text-center">
            <h2 class="camp-details-cta-title">Together, We Can Save Our Rivers &amp; Empower Society</h2>
            <p class="camp-details-cta-text">
              Join hands with Bangladesh River Environment Protection Rights Society to safeguard nature, educate youth,
              and support vulnerable communities.
            </p>
          </div>
          <div class="col-lg-4 text-end text-lg-end text-center mt-lg-0 mt-4">
            <div class="camp-details-cta-buttons">
              <a href="{{route('volunteer')}}" class="camp-details-cta-btn-gold">
                <i class="fas fa-user-plus"></i> Join As Volunteer
              </a>
              <a href="{{route('contact')}}" class="camp-details-cta-btn-outline">
                <i class="fas fa-envelope"></i> Contact Us
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
