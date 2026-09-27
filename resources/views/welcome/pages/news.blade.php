@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{ isset($page) && $page->seo_title ? $page->seo_title : 'News & Events — ' . (general()->title ?: 'Green Earth Foundation') }}</title>
@endsection

@section('SEO')
@if(isset($page) && $page)
<meta name="title" property="og:title" content="{{$page->seo_title ?: 'News & Events — ' . (general()->title ?: 'Green Earth Foundation')}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description ?: general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword ?: general()->meta_keyword}}" />
@if($page->imageFile)
<meta name="image" property="og:image" content="{{asset($page->image())}}" />
@endif
@endif
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/news.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="news-header-banner">
    <div class="container">
      <h1 class="news-banner-title">News & Events</h1>
      <div class="news-banner-crumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <span class="text-white">News</span>
      </div>
    </div>
  </section>

  <!-- ========== NEWS GRID ========== -->
  <section class="news-grid-section">
    <div class="container">
      <div class="row g-4">

        @forelse($posts as $post)
        <div class="col-lg-3 col-md-6 col-6">
          <article class="news-card-flat">
            <div class="news-card-media">
              <img src="{{asset($post->image())}}" alt="{{$post->name}}" class="news-card-img" />
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
        <div class="col-12 text-center py-5">
          <p class="text-muted">No news articles found at this time.</p>
        </div>
        @endforelse

      </div>

      @if(method_exists($posts, 'links'))
      <div class="d-flex justify-content-center mt-5">
        {{ $posts->links() }}
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
