@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{ isset($page) && $page->seo_title ? $page->seo_title : 'Our Campaigns — ' . (general()->title ?: 'Bangladesh River Environment Protection Rights Society') }}</title>
@endsection

@section('SEO')
@if(isset($page) && $page)
<meta name="title" property="og:title" content="{{$page->seo_title ?: 'Our Campaigns — ' . (general()->title ?: 'Bangladesh River Environment Protection Rights Society')}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description ?: general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword ?: general()->meta_keyword}}" />
@if($page->imageFile)
<meta name="image" property="og:image" content="{{asset($page->image())}}" />
@endif
@endif
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/campaigns.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB BANNER ========== -->
  <section class="campaigns-header-banner">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="campaigns-banner-title">Our Campaigns</h1>
          <div class="campaigns-banner-breadcrumbs">
            <a href="{{route('index')}}">Home</a><span>/</span>Campaigns
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== FILTER SECTION ========== -->
  <section class="campaigns-filter-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="campaigns-filter-row">
            <button type="button" class="campaigns-filter-btn active" data-filter="all">All Campaigns</button>
            <button type="button" class="campaigns-filter-btn" data-filter="active">Active</button>
            <button type="button" class="campaigns-filter-btn" data-filter="ongoing">Ongoing</button>
            <button type="button" class="campaigns-filter-btn" data-filter="new">New</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== CAMPAIGNS GRID ========== -->
  <section class="campaigns-grid-section">
    <div class="container">
      <div class="row g-4">

        @forelse($campaigns as $camp)
          @php
            $tag = $camp->seo_title ?: 'Active';
            $filterStatus = strtolower($tag);
            if(!in_array($filterStatus, ['active', 'ongoing', 'new'])) {
                $filterStatus = 'active';
            }
          @endphp
          <!-- Dynamic Campaign Card -->
          <div class="col-lg-3 col-md-6 col-6" data-status="{{$filterStatus}}">
            <div class="campaign-card-flat">
              <div class="campaign-card-media">
                <img src="{{asset($camp->image())}}" alt="{{$camp->name}}" class="campaign-card-img" />
                <span class="campaign-card-tag">{{$tag}}</span>
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
          <div class="col-12 text-center py-5">
            <p>No campaigns found.</p>
          </div>
        @endforelse

      </div>

      @if(method_exists($campaigns, 'hasPages') && $campaigns->hasPages())
      <div class="d-flex justify-content-center mt-5">
        {{ $campaigns->links('pagination::bootstrap-5') }}
      </div>
      @endif
    </div>
  </section>
@endsection

@push('js')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const filterBtns = document.querySelectorAll('.campaigns-filter-btn');
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
