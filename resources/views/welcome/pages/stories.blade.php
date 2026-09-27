@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{ isset($page) && $page->seo_title ? $page->seo_title : 'Success Stories — ' . (general()->title ?: 'Green Earth Foundation') }}</title>
@endsection

@section('SEO')
@if(isset($page) && $page)
<meta name="title" property="og:title" content="{{$page->seo_title ?: 'Success Stories — ' . (general()->title ?: 'Green Earth Foundation')}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description ?: general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword ?: general()->meta_keyword}}" />
@if($page->imageFile)
<meta name="image" property="og:image" content="{{asset($page->image())}}" />
@endif
@endif
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/stories.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="stories-header-banner">
    <div class="container">
      <h1 class="stories-banner-title">Success Stories</h1>
      <div class="stories-banner-crumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <span class="text-white">Stories</span>
      </div>
    </div>
  </section>

  <!-- ========== STORIES GRID ========== -->
  <section class="stories-grid-section">
    <div class="container">
      <div class="row g-4">

        @forelse($stories as $story)
        <div class="col-lg-3 col-md-6 col-6">
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
        <div class="col-12 text-center py-5">
          <p class="text-muted">No success stories found at this time.</p>
        </div>
        @endforelse

      </div>

      @if(method_exists($stories, 'links'))
      <div class="d-flex justify-content-center mt-5">
        {{ $stories->links() }}
      </div>
      @endif
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
