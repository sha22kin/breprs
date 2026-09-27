@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{ isset($page) && $page->seo_title ? $page->seo_title : 'Our Projects — ' . (general()->title ?: 'Green Earth Foundation') }}</title>
@endsection

@section('SEO')
@if(isset($page) && $page)
<meta name="title" property="og:title" content="{{$page->seo_title ?: 'Our Projects — ' . (general()->title ?: 'Green Earth Foundation')}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description ?: general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword ?: general()->meta_keyword}}" />
@if($page->imageFile)
<meta name="image" property="og:image" content="{{asset($page->image())}}" />
@endif
@endif
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/projects.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="projects-header-banner">
    <div class="container">
      <h1 class="projects-header-title">Our Projects</h1>
      <div class="projects-header-crumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <span class="text-white">Projects</span>
      </div>
    </div>
  </section>

  <!-- ========== FILTER SECTION ========== -->
  <section class="projects-filter-wrap">
    <div class="container">
      <div class="projects-filter-bar">
        <button class="projects-filter-btn active" data-filter="all">All Projects</button>
        <button class="projects-filter-btn" data-filter="active">Active</button>
        <button class="projects-filter-btn" data-filter="upcoming">Upcoming</button>
        <button class="projects-filter-btn" data-filter="completed">Completed</button>
      </div>
    </div>
  </section>

  <!-- ========== PROJECTS GRID ========== -->
  <section class="projects-grid-section">
    <div class="container">
      <div class="row g-4">

        @forelse($projects as $proj)
        @php
          $statusLower = strtolower($proj->seo_title ?: 'active');
          $badgeClass = 'project-card-badge--' . ($statusLower == 'completed' ? 'completed' : ($statusLower == 'upcoming' ? 'upcoming' : 'active'));
          $parts = array_filter(array_map('trim', explode('|', $proj->seo_keyword ?: '')));
          $icons = ['fa-tree', 'fa-users', 'fa-calendar', 'fa-seedling', 'fa-paw', 'fa-solar-panel', 'fa-tint', 'fa-leaf'];
        @endphp
        <div class="col-lg-3 col-md-6 col-6" data-status="{{ $statusLower }}">
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
                    <span class="project-label-tag {{ $k > 1 ? 'd-none d-md-inline-flex' : '' }}">
                      <i class="fas {{ $icons[$k % count($icons)] }}"></i> {{ $part }}
                    </span>
                  @endforeach
                @else
                  <span class="project-label-tag"><i class="fas fa-tree"></i> Active</span>
                  <span class="project-label-tag"><i class="fas fa-users"></i> Volunteers</span>
                @endif
              </div>
              <div class="project-card-footer-flat">
                <a href="{{route('projectView', $proj->slug ?: $proj->id)}}" class="project-footer-btn-flat stretched-link">
                  Details <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
          <p class="text-muted">No projects found at this moment.</p>
        </div>
        @endforelse

      </div>

      @if(method_exists($projects, 'links'))
      <div class="d-flex justify-content-center mt-5">
        {{ $projects->links() }}
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

@push('js')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const filterBtns = document.querySelectorAll('.projects-filter-btn');
      const cards = document.querySelectorAll('[data-status]');

      filterBtns.forEach(btn => {
        btn.addEventListener('click', function () {
          filterBtns.forEach(b => b.classList.remove('active'));
          this.classList.add('active');

          const filterValue = this.getAttribute('data-filter');

          cards.forEach(card => {
            if (filterValue === 'all') {
              card.style.display = 'block';
            } else {
              const status = card.getAttribute('data-status');
              if (status === filterValue) {
                card.style.display = 'block';
              } else {
                card.style.display = 'none';
              }
            }
          });
        });
      });
    });
  </script>
@endpush
