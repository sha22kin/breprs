@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{ isset($page) && $page->seo_title ? $page->seo_title : 'Our Members — ' . (general()->title ?: 'Green Earth Foundation') }}</title>
@endsection

@section('SEO')
@if(isset($page) && $page)
<meta name="title" property="og:title" content="{{$page->seo_title ?: 'Our Members — ' . (general()->title ?: 'Green Earth Foundation')}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description ?: general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword ?: general()->meta_keyword}}" />
@if($page->imageFile)
<meta name="image" property="og:image" content="{{asset($page->image())}}" />
@endif
@endif
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/members.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="members-header-banner">
    <div class="container">
      <h1 class="members-banner-title">Our Members</h1>
      <div class="members-banner-crumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <span class="text-white">Members</span>
      </div>
    </div>
  </section>

  <!-- ========== TEAM MEMBERS GRID SECTION ========== -->
  <section class="members-grid-section">
    <div class="container">
      <!-- Section Header -->
      <div class="section-heading-wrapper">
        <span class="section-tagline"><i class="fas fa-users"></i> Our Team</span>
        <h2 class="section-main-title">Meet Our Dedicated <span>Members</span></h2>
        <p class="section-short-desc">
          Our passionate team of environmentalists, experts, and community leaders working tirelessly to protect and restore nature.
        </p>
      </div>

      <!-- Members Grid -->
      <div class="row g-4">
        @if($members->count() > 0)
          @foreach($members as $member)
          <div class="col-lg-3 col-md-4 col-sm-6 col-6">
            <div class="members-profile-card-flat">
              <div class="members-card-media-box">
                @if($member->seo_title)
                <span class="members-card-id-badge">{{$member->seo_title}}</span>
                @endif
                <img src="{{asset($member->image())}}" alt="{{$member->name}}" class="members-card-img" />
                <div class="members-card-image-overlay">
                  <div class="members-overlay-social-list">
                    @if($member->seo_description)
                    <a href="{{$member->seo_description}}" class="members-overlay-social-link" aria-label="Facebook" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($member->tags)
                    <a href="{{$member->tags}}" class="members-overlay-social-link" aria-label="Twitter" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if($member->search_key)
                    <a href="{{$member->search_key}}" class="members-overlay-social-link" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                  </div>
                </div>
              </div>
              <div class="members-card-body-flat">
                <div>
                  <h4 class="members-card-name-flat">{{$member->name}}</h4>
                  @if($member->short_description)
                  <span class="members-card-occupation-label">{{$member->short_description}}</span>
                  @endif
                </div>
                @if($member->seo_keyword)
                <div class="members-card-info-wrap">
                  <span class="members-card-meta-phone">
                    <i class="fas fa-phone-alt"></i> <a href="tel:{{$member->seo_keyword}}">{{$member->seo_keyword}}</a>
                  </span>
                </div>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        @else
          <!-- Fallback: no members added yet -->
          <div class="col-12 text-center py-5">
            <p class="text-muted">No members found. Please add members from the admin panel.</p>
          </div>
        @endif
      </div> <!-- Closes row g-4 -->
    </div> <!-- Closes container -->
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
