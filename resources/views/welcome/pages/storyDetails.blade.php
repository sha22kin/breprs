@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{ $story ? $story->name : 'Success Story' }} — Green Earth Foundation</title>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/story-details.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="story-details-banner-section">
    <div class="container">
      <h1 class="story-details-banner-title">{{ $story ? $story->name : 'Success Story' }}</h1>
      <div class="story-details-banner-breadcrumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <a href="{{route('stories')}}">Stories</a>
        <span>/</span>
        <span class="text-white">{{ Str::limit($story ? $story->name : 'Details', 35) }}</span>
      </div>
    </div>
  </section>

  <!-- ========== STORY DETAILS CONTENT ========== -->
  <section class="story-details-main-section">
    <div class="container">
      <div class="row g-4">

        <!-- Left Column: Story Details -->
        <div class="col-lg-8 col-12">
          <div class="story-details-content-card">
            
            <!-- Cover Image -->
            <div class="story-details-image-container">
              <img src="{{asset($story ? $story->image() : 'assets/ima/story1.png')}}" alt="{{$story ? $story->name : 'Story Cover'}}" class="story-details-cover-image" />
              <div class="story-details-category-label">{{ ($story && $story->tags) ? $story->tags : 'Conservation' }}</div>
            </div>

            <!-- Meta Row -->
            <div class="story-details-meta-row">
              <span class="story-details-meta-item">
                <i class="far fa-calendar-alt"></i> Impact Year: {{ ($story && $story->seo_title) ? $story->seo_title : '2025' }}
              </span>
              <span class="story-details-meta-item">
                <i class="far fa-user"></i> By Green Earth Team
              </span>
              <span class="story-details-meta-item">
                <i class="far fa-map"></i> {{ ($story && $story->seo_description) ? $story->seo_description : 'Bangladesh' }}
              </span>
            </div>

            <!-- Title -->
            <h2 class="story-details-article-title">{{ $story ? $story->name : 'Success Story' }}</h2>

            @if($story && $story->short_description)
            <p class="lead font-weight-bold" style="color: #495057;">
              {{ $story->short_description }}
            </p>
            @endif

            <!-- Impact Metrics Dashboard Row -->
            <div class="story-details-impact-wrapper">
              <div class="story-details-impact-header">
                <i class="fas fa-award"></i> Key Impact Achievements
              </div>
              <div class="row g-3">
                @php
                  $metricParts = ($story && $story->seo_keyword) ? array_filter(array_map('trim', explode('•', $story->seo_keyword))) : ['10K+ Trees Planted', '200 Acres Restored', '500+ Families Supported'];
                @endphp
                @foreach($metricParts as $idx => $mPart)
                <div class="col-md-4 col-{{ $idx == 2 ? '12' : '6' }}">
                  <div class="story-details-impact-box">
                    <div class="story-details-impact-value">
                      <i class="fas fa-check-circle text-success" style="font-size: 1.1rem;"></i>
                    </div>
                    <p class="story-details-impact-label" style="font-size: 1rem; font-weight: 600; color: #2e7d32; margin-top: 5px;">{{ $mPart }}</p>
                  </div>
                </div>
                @endforeach
              </div>
            </div>

            <!-- Rich Content -->
            <div class="story-details-rich-text-wrapper">
              {!! $story ? $story->description : '' !!}
            </div>

            <!-- Tags & Share Row -->
            <div class="story-details-tags-share-row">
              <div class="story-details-tags-wrapper">
                <span class="story-details-tag-title">Category:</span>
                <span class="badge badge-success px-3 py-2" style="font-size: 0.9rem;">{{ ($story && $story->tags) ? $story->tags : 'Conservation' }}</span>
              </div>
              <div class="story-details-social-share">
                <span class="story-details-share-title">Share:</span>
                <a href="#" class="story-details-share-btn share-facebook" aria-label="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="story-details-share-btn share-twitter" aria-label="Share on Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="story-details-share-btn share-linkedin" aria-label="Share on LinkedIn"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>

          </div>
        </div>

        <!-- Right Column: Sidebar -->
        <div class="col-lg-4 col-12">
          <div class="story-details-sidebar-wrapper">
            
            <!-- Recent Stories Widget -->
            @php
              $otherStories = \App\Models\Post::where('type', 5)->where('status', 'active')
                ->when($story, fn($q) => $q->where('id', '<>', $story->id))
                ->latest()->take(4)->get();
            @endphp
            <div class="sidebar-widget-container">
              <h4 class="sidebar-widget-title-heading">Recent Stories</h4>
              <div class="sidebar-stories-list">
                @foreach($otherStories as $os)
                <a href="{{route('storyView', $os->slug ?: $os->id)}}" class="sidebar-story-item">
                  <div class="sidebar-story-thumb">
                    <img src="{{asset($os->image())}}" alt="{{$os->name}}" />
                  </div>
                  <div class="sidebar-story-info">
                    <span class="sidebar-story-date">{{$os->seo_title ?: '2025'}}</span>
                    <h5 class="sidebar-story-title">{{$os->name}}</h5>
                  </div>
                </a>
                @endforeach
              </div>
            </div>

            <!-- Key Stats Summary Card -->
            <div class="sidebar-stats-widget-card">
              <h4 class="sidebar-stats-title">Campaign Support</h4>
              <div class="sidebar-stat-number-box">92%</div>
              <p class="sidebar-stat-description-text">
                Average tree sapling survival rate verified across all active conservation regions.
              </p>
              <a href="{{route('volunteer')}}" class="sidebar-stat-action-button">
                Join the Cause <i class="fas fa-arrow-right"></i>
              </a>
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
