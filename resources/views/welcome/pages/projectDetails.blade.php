@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{ $project ? $project->name : 'Project Details' }} — Green Earth Foundation</title>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/project-details.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="proj-details-header-banner">
    <div class="container">
      <h1 class="proj-details-banner-title">{{ $project ? $project->name : 'Project Details' }}</h1>
      <div class="proj-details-banner-breadcrumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <a href="{{route('projects')}}">Projects</a>
        <span>/</span>
        <span class="text-white">{{ Str::limit($project ? $project->name : 'Details', 30) }}</span>
      </div>
    </div>
  </section>

  <!-- ========== PROJECT DETAILS CONTENT ========== -->
  <section class="proj-details-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto col-12">
          
          <div class="proj-details-card">
            <!-- Cover Image -->
            <div class="proj-details-img-wrap">
              <img src="{{asset($project ? $project->image() : 'assets/ima/project1.png')}}" alt="{{$project ? $project->name : 'Project Cover'}}" class="proj-details-img" />
            </div>

            <!-- Metadata Row -->
            <div class="proj-details-meta-row">
              <span class="proj-details-meta-item proj-details-meta-item--location">
                <i class="fas fa-map-marker-alt"></i> {{ ($project && $project->seo_description) ? $project->seo_description : 'Bangladesh' }}
              </span>
              <span class="proj-details-meta-item proj-details-meta-item--status">
                <i class="fas fa-check-circle"></i> {{ ($project && $project->seo_title) ? $project->seo_title : 'Active' }} Project
              </span>
              <span class="proj-details-meta-item proj-details-meta-item--date">
                <i class="fas fa-calendar-alt"></i> {{ ($project && $project->created_at) ? $project->created_at->format('Y') . ' - Ongoing' : '2024 - 2026' }}
              </span>
            </div>

            <!-- Project Title -->
            <h2 class="proj-details-title-flat">{{ $project ? $project->name : 'Project Details' }}</h2>

            @if($project && $project->short_description)
            <p class="proj-details-text lead font-weight-bold">
              {{ $project->short_description }}
            </p>
            @endif

            <!-- Detailed Description -->
            <div class="proj-details-text">
              {!! $project ? $project->description : '' !!}
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
