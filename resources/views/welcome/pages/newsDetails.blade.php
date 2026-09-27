@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{ $post ? $post->name : 'News Details' }} — Green Earth Foundation</title>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/news-details.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="news-details-banner-section">
    <div class="container">
      <h1 class="news-details-banner-title">News Details</h1>
      <div class="news-details-banner-breadcrumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <a href="{{route('news')}}">News</a>
        <span>/</span>
        <span class="text-white">{{ Str::limit($post ? $post->name : 'Details', 35) }}</span>
      </div>
    </div>
  </section>

  <!-- ========== NEWS DETAILS CONTENT ========== -->
  <section class="news-details-main-section">
    <div class="container">
      <div class="row g-4">

        <!-- Left Column: Article Details -->
        <div class="col-lg-8 col-12">
          
          <div class="news-details-content-card">
            
            <!-- Cover image -->
            <div class="news-details-image-container">
              <img src="{{asset($post ? $post->image() : 'assets/ima/campaign1.png')}}" alt="{{$post ? $post->name : 'News Cover'}}" class="news-details-cover-image" />
              <div class="news-details-category-label">{{ ($post && $post->seo_title) ? $post->seo_title : 'News' }}</div>
            </div>

            <!-- Meta Row -->
            <div class="news-details-meta-row">
              <span class="news-details-meta-item">
                <i class="far fa-user"></i> By Admin
              </span>
              <span class="news-details-meta-item">
                <i class="far fa-calendar-alt"></i> {{ ($post && $post->created_at) ? $post->created_at->format('F d, Y') : date('F d, Y') }}
              </span>
              <span class="news-details-meta-item">
                <i class="far fa-comment"></i> {{ ($post && $post->postComments) ? $post->postComments->count() : 0 }} Comments
              </span>
              <span class="news-details-meta-item">
                <i class="far fa-eye"></i> {{ ($post && $post->view) ? $post->view : 180 }} Views
              </span>
            </div>

            <!-- Title -->
            <h2 class="news-details-article-title">{{ $post ? $post->name : 'News Title' }}</h2>

            @if($post && $post->short_description)
            <p class="lead font-weight-bold" style="color: #495057;">
              {{ $post->short_description }}
            </p>
            @endif

            <!-- Detailed Content -->
            <div class="news-details-rich-text-wrapper">
              {!! $post ? $post->description : '' !!}
            </div>

            <!-- Tags & Share Row -->
            <div class="news-details-tags-share-row">
              <div class="news-details-tags-wrapper">
                <span class="news-details-tag-title">Tags:</span>
                @php
                  $tagsList = $post && $post->tags ? array_filter(array_map('trim', explode(',', $post->tags))) : ['Environment', 'Conservation', 'GreenEarth'];
                @endphp
                @foreach($tagsList as $tag)
                <a href="{{route('news')}}" class="news-details-tag-link">{{$tag}}</a>
                @endforeach
              </div>
              <div class="news-details-social-share">
                <span class="news-details-share-title">Share:</span>
                <a href="#" class="news-details-share-btn share-facebook" aria-label="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="news-details-share-btn share-twitter" aria-label="Share on Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="news-details-share-btn share-linkedin" aria-label="Share on LinkedIn"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>

          </div>

          <!-- Comments Section -->
          <div class="news-details-comments-section">
            <h3 class="comments-section-title">Community Responses</h3>
            
            <ul class="news-details-comments-list">
              <li class="news-details-comment-item">
                <div class="comment-author-avatar-box">
                  <img src="{{asset('assets')}}/ima/avatar1.png" alt="Commenter Avatar" />
                </div>
                <div class="comment-content-body-box">
                  <div class="comment-header-row">
                    <h5 class="comment-author-name-title">Farhan Ahmed</h5>
                    <span class="comment-date-timestamp">2 days ago</span>
                  </div>
                  <p class="comment-paragraph-text">
                    Incredible initiative! Collective civic engagement in river protection and tree preservation is exactly what our country needs for future generations.
                  </p>
                </div>
              </li>
            </ul>

            <!-- Leave a Comment Form -->
            <div class="news-details-reply-form-wrapper">
              <h3 class="reply-form-title">Leave a Reply</h3>
              <p class="reply-form-subtitle">Your email address will not be published. Required fields are marked *</p>
              
              <form class="comment-submit-form" onsubmit="return false;">
                <div class="row g-3">
                  <div class="col-md-6">
                    <input type="text" class="comment-form-input-field" placeholder="Your Name *" required />
                  </div>
                  <div class="col-md-6">
                    <input type="email" class="comment-form-input-field" placeholder="Your Email *" required />
                  </div>
                  <div class="col-12">
                    <textarea class="comment-form-textarea-field" rows="5" placeholder="Your Comment *" required></textarea>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="comment-form-submit-btn">Post Comment</button>
                  </div>
                </div>
              </form>
            </div>

          </div>

        </div>

        <!-- Right Column: Sidebar -->
        <div class="col-lg-4 col-12">
          
          <aside class="news-details-sidebar-wrapper">
            
            <!-- Sidebar Widget: Search -->
            <div class="sidebar-widget-container">
              <h4 class="sidebar-widget-title-heading">Search</h4>
              <form class="sidebar-search-form" action="{{route('news')}}" method="get">
                <input type="text" name="search" class="sidebar-search-input-field" placeholder="Search news..." />
                <button type="submit" class="sidebar-search-submit-btn" aria-label="Search">
                  <i class="fas fa-search"></i>
                </button>
              </form>
            </div>

            <!-- Sidebar Widget: Recent Posts -->
            @php
              $recentPosts = \App\Models\Post::where('type', 1)->where('status', 'active')
                ->when($post, fn($q) => $q->where('id', '<>', $post->id))
                ->latest()->take(4)->get();
            @endphp
            <div class="sidebar-widget-container">
              <h4 class="sidebar-widget-title-heading">Recent News</h4>
              <div class="sidebar-recent-posts-list">
                @foreach($recentPosts as $rp)
                <article class="sidebar-post-item">
                  <div class="sidebar-post-img-box">
                    <img src="{{asset($rp->image())}}" alt="{{$rp->name}}" />
                  </div>
                  <div class="sidebar-post-details">
                    <h5 class="sidebar-post-heading-title">
                      <a href="{{route('newsView', $rp->slug ?: $rp->id)}}">{{$rp->name}}</a>
                    </h5>
                    <span class="sidebar-post-date"><i class="far fa-calendar-alt"></i> {{$rp->created_at->format('M d, Y')}}</span>
                  </div>
                </article>
                @endforeach
              </div>
            </div>

            <!-- Sidebar Widget: Categories -->
            <div class="sidebar-widget-container">
              <h4 class="sidebar-widget-title-heading">Initiatives</h4>
              <ul class="sidebar-categories-list">
                <li><a href="{{route('campaigns')}}" class="sidebar-category-link">Plantation Drives <span class="category-count-badge"><i class="fas fa-arrow-right"></i></span></a></li>
                <li><a href="{{route('projects')}}" class="sidebar-category-link">Conservation Projects <span class="category-count-badge"><i class="fas fa-arrow-right"></i></span></a></li>
                <li><a href="{{route('stories')}}" class="sidebar-category-link">Success Stories <span class="category-count-badge"><i class="fas fa-arrow-right"></i></span></a></li>
                <li><a href="{{route('volunteer')}}" class="sidebar-category-link">Youth Volunteers <span class="category-count-badge"><i class="fas fa-arrow-right"></i></span></a></li>
              </ul>
            </div>

          </aside>

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
