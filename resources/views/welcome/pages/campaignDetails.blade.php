@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{$campaign ? $campaign->name : 'Campaign Details'}} — Bangladesh River Environment Protection Rights Society</title>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/campaign-details.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB BANNER ========== -->
  <section class="camp-details-header-banner">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="camp-details-banner-title">Campaign Details</h1>
          <div class="camp-details-banner-breadcrumbs">
            <a href="{{route('index')}}">Home</a><span>/</span><a href="{{route('campaigns')}}">Campaigns</a><span>/</span>{{$campaign ? $campaign->name : 'Campaign Details'}}
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== MAIN DETAILS SECTION ========== -->
  <section class="camp-details-section">
    <div class="container">
      <div class="row g-4">
        
        <!-- Left Side Column -->
        <div class="col-lg-10 mx-auto col-12">
          <div class="camp-details-left-card">
            
            <!-- Cover Image Wrap -->
            <div class="camp-details-img-wrap">
              <img src="{{asset($campaign ? $campaign->image() : 'assets/ima/campaign1.png')}}" alt="{{$campaign ? $campaign->name : 'Campaign'}}" class="camp-details-cover-img" />
            </div>

            <!-- Meta Information Row -->
            <div class="camp-details-meta-row">
              <span class="camp-details-cat-tag">Environment</span>
              <span class="camp-details-status-badge">{{($campaign && $campaign->seo_title) ? $campaign->seo_title : 'Active'}}</span>
              <span class="camp-details-date-lbl">
                <i class="far fa-calendar-alt"></i> Started: {{$campaign && $campaign->created_at ? $campaign->created_at->format('M d, Y') : 'Jan 15, 2026'}}
              </span>
            </div>

            <!-- Title -->
            <h2 class="camp-details-title-heading">{{$campaign ? $campaign->name : 'Million Tree Plantation'}}</h2>

            <!-- Detailed Content -->
            <div class="camp-details-rich-text">
              @if($campaign && $campaign->description)
                {!! $campaign->description !!}
              @else
                <p>
                  {{$campaign ? $campaign->short_description : 'Our environmental initiatives focus on river preservation, tree plantation, preventing deforestation, and empowering local communities.'}}
                </p>
              @endif
            </div>

            <!-- Campaign Objectives -->
            <div class="camp-details-objectives-card">
              <h3 class="camp-details-objectives-title">Key Campaign Objectives</h3>
              <ul class="camp-details-objectives-list">
                <li class="camp-details-objective-item">
                  <i class="fas fa-check-circle"></i>
                  <span>Engage local riverbank communities, schools, and youth volunteers in environmental conservation.</span>
                </li>
                <li class="camp-details-objective-item">
                  <i class="fas fa-check-circle"></i>
                  <span>Protect natural habitats, clean water sources, and prevent industrial and plastic pollution.</span>
                </li>
                <li class="camp-details-objective-item">
                  <i class="fas fa-check-circle"></i>
                  <span>Promote sustainable ecological guardianship models across vulnerable river basins in Bangladesh.</span>
                </li>
              </ul>
            </div>

          </div>
        </div>

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
