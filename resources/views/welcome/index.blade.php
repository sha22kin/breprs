@extends(welcomeTheme().'layouts.app')

@section('title')
<title>Green Earth Foundation — Protect Nature, Plant Trees, Save Forests</title>
@endsection

@section('contents')
<!-- ========== HERO SLIDER ========== -->
  @php
    $heroSlider = $slider ?? (slider('Front Page Slider') ?? (slider('Home Slider') ?? \App\Models\Attribute::where('type', 1)->where('status', 'active')->whereNull('parent_id')->first()));
    $heroSlides = ($heroSlider && $heroSlider->subSliders->count() > 0) ? $heroSlider->subSliders : null;
  @endphp
  <section class="hero-slider-section">
    <div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="6000">

      @if($heroSlides && $heroSlides->count() > 0)
        <!-- Indicators -->
        <div class="carousel-indicators">
          @foreach($heroSlides as $key => $slide)
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{$key}}" class="{{$loop->first ? 'active' : ''}}" @if($loop->first) aria-current="true" @endif
            aria-label="Slide {{$key + 1}}"></button>
          @endforeach
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
          @foreach($heroSlides as $slide)
          <div class="carousel-item {{$loop->first ? 'active' : ''}}">
            <img src="{{asset($slide->image())}}" alt="{{$slide->name ?: 'BREPRS Slider'}}" class="hero-slide-img" />
          </div>
          @endforeach
        </div>
      @else
        <!-- Indicators -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('assets')}}/ima/slider1.webp" alt="Planting Trees" class="hero-slide-img" />
          </div>
          <div class="carousel-item">
            <img src="{{asset('assets')}}/ima/slider2.webp" alt="Forest Conservation" class="hero-slide-img" />
          </div>
          <div class="carousel-item">
            <img src="{{asset('assets')}}/ima/slider3.webp" alt="Environmental Awareness" class="hero-slide-img" />
          </div>
        </div>
      @endif

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
        <span class="visually-hidden">Next</span>
      </button>

    </div>
  </section>


  <!-- ========== STATISTICS / IMPACT COUNTER ========== -->
  <section class="stats-counter-section section-gap-md">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-3 col-md-6 col-6">
          <div class="stats-card-flat">
            <div class="stats-card-icon-flat">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stats-card-svg-icon">
                <path d="M2 20h20" />
                <path d="M12 20v-8" />
                <path d="M12 12c-3.5 0-6-2.5-6-6 0 0 2.5 0 6 6z" fill="currentColor" fill-opacity="0.25" />
                <path d="M12 12c3.5 0 6-2.5 6-6 0 0-2.5 0-6 6z" fill="currentColor" />
                <path d="M12 16c-2.5 0-4-1.5-4-4 0 0 1.5 0 4 4z" fill="currentColor" fill-opacity="0.25" />
                <path d="M12 16c2.5 0 4-1.5 4-4 0 0-1.5 0-4 4z" fill="currentColor" />
              </svg>
            </div>
            <h3 class="stats-card-num-flat">50,000<span>+</span></h3>
            <p class="stats-card-label-flat">Tree Plantation</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
          <div class="stats-card-flat">
            <div class="stats-card-icon-flat">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stats-card-svg-icon">
                <path d="M2 6c3 0 3 4 6 4s3-4 6-4 3 4 6 4 3-4 6-4" />
                <path d="M2 12c3 0 3 4 6 4s3-4 6-4 3 4 6 4 3-4 6-4" fill="currentColor" fill-opacity="0.25" />
                <path d="M2 18c3 0 3 4 6 4s3-4 6-4 3 4 6 4 3-4 6-4" />
              </svg>
            </div>
            <h3 class="stats-card-num-flat">12<span>+</span></h3>
            <p class="stats-card-label-flat">Rivers Cleaned</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
          <div class="stats-card-flat">
            <div class="stats-card-icon-flat">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stats-card-svg-icon">
                <path d="M8 17H3l4-5H4l5-6 5 6h-3l4 5H8z" fill="currentColor" fill-opacity="0.25" stroke="none" />
                <path d="M8 17v3" />
                <path d="M16 17h-5l4-5h-3l5-6 5 6h-3l4 5h-5z" fill="currentColor" />
                <path d="M16 17v3" />
              </svg>
            </div>
            <h3 class="stats-card-num-flat">1,500<span>+</span></h3>
            <p class="stats-card-label-flat">Acres Protected</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
          <div class="stats-card-flat">
            <div class="stats-card-icon-flat">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stats-card-svg-icon">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"
                  fill="currentColor" fill-opacity="0.2" stroke="none" />
                <path d="M2 12h20" opacity="0.4" />
                <path d="M12 12c2.5 0 4-1.5 4-4 0 0-1.5 0-4 4z" fill="currentColor" />
                <path d="M12 12c-2.5 0-4-1.5-4-4 0 0 1.5 0 4 4z" fill="currentColor" fill-opacity="0.5" />
              </svg>
            </div>
            <h3 class="stats-card-num-flat">120<span>+</span></h3>
            <p class="stats-card-label-flat">Green Campaigns</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== ABOUT / MISSION ========== -->
  <section id="about" class="about-mission-section section-gap-lg">
    <div class="container">
      <div class="row align-items-center">
        <!-- Content Column -->
        <div class="col-lg-6">
          <h2 class="about-mission-title">
            Our Mission to <span>Protect</span> the Environment
          </h2>
          <p class="about-mission-text">
            Green Earth Foundation is dedicated to environmental conservation through tree
            plantation drives, preventing illegal logging, protecting forests, and creating
            awareness about the importance of nature in our lives.
          </p>

          <!-- Feature List -->
          <div class="about-features-container">
            <div class="about-feature-card feature-card-blue">
              <div class="about-feature-card-icon">
                <i class="fas fa-water"></i>
              </div>
              <div class="about-feature-card-info">
                <h6>Green River Foundation</h6>
              </div>
            </div>
            <div class="about-feature-card feature-card-green">
              <div class="about-feature-card-icon">
                <i class="fas fa-leaf"></i>
              </div>
              <div class="about-feature-card-info">
                <h6>River & Forest Alliance</h6>
              </div>
            </div>
            <div class="about-feature-card feature-card-amber">
              <div class="about-feature-card-icon">
                <i class="fas fa-shield-alt"></i>
              </div>
              <div class="about-feature-card-info">
                <h6>Nature Shield Bangladesh</h6>
              </div>
            </div>
            <div class="about-feature-card feature-card-teal">
              <div class="about-feature-card-icon">
                <i class="fas fa-globe"></i>
              </div>
              <div class="about-feature-card-info">
                <h6>Climate Action Bangladesh</h6>
              </div>
            </div>
          </div>

          <a href="#campaigns" class="btn-flat-outline">
            <i class="fas fa-arrow-right"></i> Explore Our Campaigns
          </a>
        </div>

        <!-- Visual Column -->
        <div class="col-lg-6">
          <div class="about-visual-panel-image-wrapper">
            <img src="{{asset('assets')}}/ima/mi1.webp" alt="Our Mission to Protect the Environment" class="about-visual-image" />
            <div class="about-glass-badge">
              <div class="about-glass-badge-icon">
                <i class="fas fa-award"></i>
              </div>
              <div class="about-glass-badge-content">
                <span class="about-badge-num">10+</span>
                <span class="about-badge-lbl">Years Active Impact</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ========== CAMPAIGN HIGHLIGHTS ========== -->
  @php
    $homeCampaigns = \App\Models\Post::where('type', 3)->where('status', 'active')->latest()->take(4)->get();
  @endphp
  <section id="campaigns" class="campaign-section section-gap-lg">
    <div class="container">
      <!-- Section Header -->
      <div class="section-heading-wrapper">
        <span class="section-tagline"><i class="fas fa-leaf"></i> Our Campaigns</span>
        <h2 class="section-main-title">Environmental <span>Campaigns</span></h2>
        <p class="section-short-desc">
          Our ongoing initiatives focus on planting trees, protecting forests, cleaning
          the environment, and spreading awareness across communities.
        </p>
      </div>

      <!-- Campaign Cards -->
      <div class="row g-3">
        @forelse($homeCampaigns as $camp)
        <div class="col-lg-3 col-md-6">
          <div class="campaign-card-flat animate-fade-up">
            <div class="campaign-card-media">
              <img src="{{asset($camp->image())}}" alt="{{$camp->name}}" class="campaign-card-img" />
              <span class="campaign-card-tag">{{$camp->seo_title ?: 'Active'}}</span>
            </div>
            <div class="campaign-card-content">
              <h4 class="campaign-card-title-flat">{{$camp->name}}</h4>
              <p class="campaign-card-desc-flat">
                {{$camp->short_description ?: Str::limit(strip_tags($camp->description), 80)}}
              </p>
              <a href="{{route('campaignView', $camp->slug ?: $camp->id)}}" class="campaign-card-action-link stretched-link">
                Learn More <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        @empty
        <div class="col-lg-3 col-md-6">
          <div class="campaign-card-flat animate-fade-up">
            <div class="campaign-card-media">
              <img src="{{asset('assets')}}/ima/campaign1.png" alt="Million Tree Plantation" class="campaign-card-img" />
              <span class="campaign-card-tag">Active</span>
            </div>
            <div class="campaign-card-content">
              <h4 class="campaign-card-title-flat">Million Tree Plantation</h4>
              <p class="campaign-card-desc-flat">
                Nationwide campaign planting trees across schools and roads.
              </p>
              <a href="{{route('campaignDetails')}}" class="campaign-card-action-link stretched-link">
                Learn More <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        @endforelse
      </div>

      <!-- See More Button -->
      <div class="text-center mt-5">
        <a href="{{route('campaigns')}}" class="btn-flat-outline">
          See More Campaigns <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- ========== FEATURED PROJECTS ========== -->
  <section id="projects" class="projects-section section-gap-lg">
    <div class="container">
      <!-- Section Header -->
      <div class="section-heading-wrapper">
        <span class="section-tagline"><i class="fas fa-project-diagram"></i> Featured Projects</span>
        <h2 class="section-main-title">Our Ongoing <span>Projects</span></h2>
        <p class="section-short-desc">
          Explore our active environmental protection projects making a real difference
          in communities and ecosystems across the nation.
        </p>
      </div>

      <!-- Project Cards Slider -->
      <div class="projects-slider">
        @forelse($homeProjects as $proj)
        @php
          $statusLower = strtolower($proj->seo_title ?: 'active');
          $badgeClass = 'project-card-badge--' . ($statusLower == 'completed' ? 'completed' : ($statusLower == 'upcoming' ? 'upcoming' : 'active'));
          $parts = array_filter(array_map('trim', explode('|', $proj->seo_keyword ?: '')));
          $icons = ['fa-tree', 'fa-users', 'fa-calendar', 'fa-seedling', 'fa-paw', 'fa-solar-panel', 'fa-tint', 'fa-leaf'];
        @endphp
        <div class="project-slide-item">
          <div class="project-card-flat">
            <div class="project-card-media-wrap">
              <img src="{{asset($proj->image())}}" alt="{{$proj->name}}" class="project-card-img" />
              <span class="project-card-badge {{ $badgeClass }}">{{ $proj->seo_title ?: 'Active' }}</span>
              <span class="project-card-location"><i class="fas fa-map-marker-alt"></i> {{ $proj->seo_description ?: 'Bangladesh' }}</span>
            </div>
            <div class="project-card-content-wrap">
              <h4 class="project-card-title-flat">{{$proj->name}}</h4>
              <p class="project-card-desc-flat">
                {{$proj->short_description ?: Str::limit(strip_tags($proj->description), 85)}}
              </p>
              <div class="project-labels-row">
                @if(!empty($parts))
                  @foreach($parts as $k => $part)
                    <span class="project-label-tag">
                      <i class="fas {{ $icons[$k % count($icons)] }}"></i> {{ $part }}
                    </span>
                  @endforeach
                @else
                  <span class="project-label-tag"><i class="fas fa-tree"></i> Active</span>
                  <span class="project-label-tag"><i class="fas fa-users"></i> Volunteers</span>
                @endif
              </div>
              <div class="project-card-footer-flat">
                <a href="{{route('projectView', $proj->slug ?: $proj->id)}}" class="project-footer-btn-flat stretched-link">Details <i
                    class="fas fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="project-slide-item">
          <div class="project-card-flat">
            <div class="project-card-media-wrap">
              <img src="{{asset('assets')}}/ima/project1.png" alt="Urban Greening Project" class="project-card-img" />
              <span class="project-card-badge project-card-badge--active">Active</span>
              <span class="project-card-location"><i class="fas fa-map-marker-alt"></i> Dhaka Division</span>
            </div>
            <div class="project-card-content-wrap">
              <h4 class="project-card-title-flat">Urban Greening Project</h4>
              <p class="project-card-desc-flat">
                Planting trees along urban highways and parks in Dhaka.
              </p>
              <div class="project-labels-row">
                <span class="project-label-tag"><i class="fas fa-tree"></i> 15K Trees</span>
                <span class="project-label-tag"><i class="fas fa-users"></i> 300 Vol</span>
                <span class="project-label-tag"><i class="fas fa-calendar"></i> '24-'26</span>
              </div>
              <div class="project-card-footer-flat">
                <a href="{{route('projects')}}" class="project-footer-btn-flat stretched-link">Details <i
                    class="fas fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ========== VOLUNTEER / JOIN TEAM ========== -->
  <section id="volunteer" class="volunteer-section section-gap-lg">
    <div class="container">
      <div class="row align-items-center">
        <!-- Content -->
        <div class="col-lg-6">
          <div class="volunteer-content-wrap">
            <span class="volunteer-tagline-flat"><i class="fas fa-hand-holding-heart"></i> Become a Team Member</span>
            <h2 class="volunteer-main-title">Join Our Green Warriors & Make a Difference</h2>
            <p class="volunteer-intro-text">
              Be part of a passionate community dedicated to environmental protection.
              Whether you can spare an hour or a day, your contribution matters in building
              a greener and healthier planet.
            </p>

            <div class="volunteer-bullet-list">
              <div class="volunteer-bullet-item">
                <i class="fas fa-check-circle"></i>
                <span>Participate in tree plantation drives across the country</span>
              </div>
              <div class="volunteer-bullet-item">
                <i class="fas fa-check-circle"></i>
                <span>Help monitor and report illegal deforestation activities</span>
              </div>
              <div class="volunteer-bullet-item">
                <i class="fas fa-check-circle"></i>
                <span>Lead awareness workshops in schools and communities</span>
              </div>
              <div class="volunteer-bullet-item">
                <i class="fas fa-check-circle"></i>
                <span>Get certified training in environmental conservation</span>
              </div>
              <div class="volunteer-bullet-item">
                <i class="fas fa-check-circle"></i>
                <span>Network with environmentalists and change makers</span>
              </div>
            </div>

            <div class="volunteer-action-btns">
              <a href="{{route('volunteer')}}" class="btn-flat-gold">
                <i class="fas fa-file-signature"></i> Apply Now
              </a>
              <a href="{{route('register')}}" class="btn-flat-secondary">
                <i class="fas fa-user-plus"></i> Sign Up
              </a>
            </div>
          </div>
        </div>

        <!-- Role Cards -->
        <div class="col-lg-6">
          <div class="volunteer-cards-grid">
            <!-- Role 1 -->
            <div class="volunteer-role-card-flat">
              <img src="{{asset('assets')}}/ima/role1.png" alt="Field Volunteer" class="volunteer-role-img-bg" />
              <div class="volunteer-role-content">
                <h5 class="volunteer-role-title-flat">
                  <i class="fas fa-seedling"></i> Field Volunteer
                </h5>
                <p class="volunteer-role-desc-flat">Join plantation drives and field activities</p>
              </div>
            </div>
            <!-- Role 2 -->
            <div class="volunteer-role-card-flat">
              <img src="{{asset('assets')}}/ima/role2.png" alt="Digital Advocate" class="volunteer-role-img-bg" />
              <div class="volunteer-role-content">
                <h5 class="volunteer-role-title-flat">
                  <i class="fas fa-laptop-code"></i> Digital Advocate
                </h5>
                <p class="volunteer-role-desc-flat">Spread awareness through digital media</p>
              </div>
            </div>
            <!-- Role 3 -->
            <div class="volunteer-role-card-flat">
              <img src="{{asset('assets')}}/ima/role3.png" alt="Educator" class="volunteer-role-img-bg" />
              <div class="volunteer-role-content">
                <h5 class="volunteer-role-title-flat">
                  <i class="fas fa-chalkboard-teacher"></i> Educator
                </h5>
                <p class="volunteer-role-desc-flat">Teach environmental education to youth</p>
              </div>
            </div>
            <!-- Role 4 -->
            <div class="volunteer-role-card-flat">
              <img src="{{asset('assets')}}/ima/role4.png" alt="Storyteller" class="volunteer-role-img-bg" />
              <div class="volunteer-role-content">
                <h5 class="volunteer-role-title-flat">
                  <i class="fas fa-camera"></i> Storyteller
                </h5>
                <p class="volunteer-role-desc-flat">Capture and share our impact stories</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== SUCCESS STORIES ========== -->
  <section id="stories" class="stories-section section-gap-lg">
    <div class="container">
      <!-- Section Header -->
      <div class="section-heading-wrapper">
        <span class="section-tagline"><i class="fas fa-trophy"></i> Success Stories</span>
        <h2 class="section-main-title">Stories of <span>Impact</span></h2>
        <p class="section-short-desc">
          Real stories from the ground showing how our initiatives have transformed
          communities and restored ecosystems across the country.
        </p>
      </div>

      <!-- Stories Cards Slider -->
      <div class="stories-slider">
        @forelse($homeStories as $story)
        <div class="story-slide-item">
          <a href="{{route('storyView', $story->slug ?: $story->id)}}" class="story-custom-card-link">
            <div class="story-card-flat">
              <div class="story-card-media-flat">
                <img src="{{asset($story->image())}}" alt="{{$story->name}}" class="story-card-img" />
                <span class="story-card-year-badge">{{$story->seo_title ?: '2025'}}</span>
              </div>
              <div class="story-card-body-flat">
                <h4 class="story-card-title-flat">{{$story->name}}</h4>
                <p class="story-card-desc-flat">
                  {{$story->short_description ?: Str::limit(strip_tags($story->description), 95)}}
                </p>
                <div class="story-card-metric-flat">
                  <i class="fas fa-chart-line"></i>
                  <span>{{ $story->seo_keyword ?: 'Impact Achieved' }}</span>
                </div>
              </div>
            </div>
          </a>
        </div>
        @empty
        <div class="story-slide-item">
          <a href="{{route('stories')}}" class="story-custom-card-link">
            <div class="story-card-flat">
              <div class="story-card-media-flat">
                <img src="{{asset('assets')}}/ima/story1.png" alt="Barind Tract Reforestation" class="story-card-img" />
                <span class="story-card-year-badge">2025</span>
              </div>
              <div class="story-card-body-flat">
                <h4 class="story-card-title-flat">Barind Tract Reforestation</h4>
                <p class="story-card-desc-flat">
                  Over 10,000 native trees planted in the drought-prone Barind Tract region, restoring green cover.
                </p>
                <div class="story-card-metric-flat">
                  <i class="fas fa-chart-line"></i>
                  <span>10,000+ Trees &bull; 200 Acres</span>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ========== TESTIMONIALS ========== -->
  <section class="testimonials-section section-gap-lg">
    <div class="container">
      <!-- Section Header -->
      <div class="section-heading-wrapper">
        <span class="section-tagline"><i class="fas fa-comments"></i> Testimonials</span>
        <h2 class="section-main-title">What People <span>Say</span></h2>
        <p class="section-short-desc">
          Hear from volunteers, community leaders, and supporters about their
          experience with Green Earth Foundation.
        </p>
        <div class="flat-divider">
          <i class="fas fa-heart"></i>
        </div>
      </div>

      <!-- Testimonial Cards -->
      <div class="row g-4">
        <!-- Testimonial 1 -->
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card-flat animate-fade-up">
            <div class="testimonial-card-quote-icon">
              <i class="fas fa-quote-left"></i>
            </div>
            <p class="testimonial-card-text">
              "Volunteering with Green Earth has been the most fulfilling experience of my
              life. Seeing the trees we planted grow into a small forest gives me incredible
              joy and hope for the future."
            </p>
            <div class="testimonial-card-stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <div class="testimonial-card-author-row">
              <div class="testimonial-card-avatar-flat">R</div>
              <div class="testimonial-card-author-info">
                <h6>Rafiq Hasan</h6>
                <p>Volunteer, Dhaka</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card-flat animate-fade-up">
            <div class="testimonial-card-quote-icon">
              <i class="fas fa-quote-left"></i>
            </div>
            <p class="testimonial-card-text">
              "Green Earth's awareness program in our village completely changed how we
              think about nature. Now every household plants at least 5 trees every year.
              Our village is greener than ever."
            </p>
            <div class="testimonial-card-stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <div class="testimonial-card-author-row">
              <div class="testimonial-card-avatar-flat">F</div>
              <div class="testimonial-card-author-info">
                <h6>Fatima Begum</h6>
                <p>Community Leader, Rajshahi</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Testimonial 3 -->
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card-flat animate-fade-up">
            <div class="testimonial-card-quote-icon">
              <i class="fas fa-quote-left"></i>
            </div>
            <p class="testimonial-card-text">
              "As a corporate sponsor, partnering with Green Earth Foundation has been
              remarkable. Their transparency, dedication, and measurable results make
              them a trustworthy environmental partner."
            </p>
            <div class="testimonial-card-stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="testimonial-card-author-row">
              <div class="testimonial-card-avatar-flat">K</div>
              <div class="testimonial-card-author-info">
                <h6>Kamal Ahmed</h6>
                <p>CEO, EcoTech Solutions</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== LATEST NEWS ========== -->
  <section id="news" class="news-section section-gap-lg">
    <div class="container">
      <!-- Section Header -->
      <div class="section-heading-wrapper">
        <span class="section-tagline"><i class="fas fa-newspaper"></i> Latest News</span>
        <h2 class="section-main-title">News & <span>Events</span></h2>
        <p class="section-short-desc">
          Stay updated with our latest environmental activities, upcoming events,
          and community achievements.
        </p>
        <div class="flat-divider">
          <i class="fas fa-rss"></i>
        </div>
      </div>

      <!-- News Cards -->
      <div class="row g-4">
        @forelse($latestPosts as $post)
        <div class="col-lg-3 col-md-6 col-6">
          <article class="news-card-flat animate-fade-up">
            <div class="news-card-media">
              <img src="{{asset($post->image())}}" alt="{{$post->name}}"
                class="news-card-img" />
              <div class="news-date-badge-flat">
                <span class="news-date-day-num">{{$post->created_at ? $post->created_at->format('d') : '01'}}</span>
                <span class="news-date-month-txt">{{$post->created_at ? $post->created_at->format('M') : 'Jan'}}</span>
              </div>
              <span class="news-cat-tag">{{$post->seo_title ?: ($post->tags ?: 'News')}}</span>
            </div>
            <div class="news-card-body-flat">
              <h4 class="news-card-title-flat">{{$post->name}}</h4>
              <p class="news-card-desc-flat">
                {{$post->short_description ?: Str::limit(strip_tags($post->description), 95)}}
              </p>
              <a href="{{route('newsView', $post->slug ?: $post->id)}}" class="news-read-more-btn stretched-link">
                Read More <i class="fas fa-arrow-right"></i>
              </a>
              <div class="news-card-meta-flat">
                <span class="news-card-meta-item"><i class="fas fa-user"></i> Admin</span>
                <span class="news-card-meta-item"><i class="fas fa-comment"></i> {{ $post->postComments ? $post->postComments->count() : 0 }} Comments</span>
              </div>
            </div>
          </article>
        </div>
        @empty
        <div class="col-lg-3 col-md-6 col-6">
          <article class="news-card-flat animate-fade-up">
            <div class="news-card-media">
              <img src="{{asset('assets')}}/ima/campaign1.png" alt="National Tree Plantation Week 2026 Launched"
                class="news-card-img" />
              <div class="news-date-badge-flat">
                <span class="news-date-day-num">05</span>
                <span class="news-date-month-txt">Jul</span>
              </div>
              <span class="news-cat-tag">Plantation</span>
            </div>
            <div class="news-card-body-flat">
              <h4 class="news-card-title-flat">National Tree Plantation Week 2026 Launched</h4>
              <p class="news-card-desc-flat">
                Green Earth Foundation kicks off the National Tree Plantation Week with a
                goal to plant 5,000 trees in 7 days across 10 districts.
              </p>
              <a href="{{route('news')}}" class="news-read-more-btn stretched-link">
                Read More <i class="fas fa-arrow-right"></i>
              </a>
              <div class="news-card-meta-flat">
                <span class="news-card-meta-item"><i class="fas fa-user"></i> Admin</span>
                <span class="news-card-meta-item"><i class="fas fa-comment"></i> 12 Comments</span>
              </div>
            </div>
          </article>
        </div>
        @endforelse
      </div>

      <!-- See More Button -->
      <div class="text-center mt-5">
        <a href="{{route('news')}}" class="btn-flat-outline">
          See More News <i class="fas fa-arrow-right"></i>
        </a>
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
