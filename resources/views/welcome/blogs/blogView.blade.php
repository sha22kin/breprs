@extends(welcomeTheme().'layouts.app')

@section('title')
<title>National Tree Plantation Week 2026 Launched — Green Earth Foundation</title>
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
        <span class="text-white">National Tree Plantation Week 2026 Launched</span>
      </div>
    </div>
  </section>

  <!-- ========== NEWS DETAILS CONTENT ========== -->
  <section class="news-details-main-section">
    <div class="container">
      <div class="row g-4">

        <!-- Left Column: Article Details (No class in column div) -->
        <div class="col-lg-8 col-12">
          
          <div class="news-details-content-card">
            
            <!-- Cover image -->
            <div class="news-details-image-container">
              <img src="{{asset('assets')}}/ima/campaign1.png" alt="National Tree Plantation Week Cover" class="news-details-cover-image" />
              <div class="news-details-category-label">Plantation</div>
            </div>

            <!-- Meta Row -->
            <div class="news-details-meta-row">
              <span class="news-details-meta-item">
                <i class="far fa-user"></i> By Admin
              </span>
              <span class="news-details-meta-item">
                <i class="far fa-calendar-alt"></i> July 05, 2026
              </span>
              <span class="news-details-meta-item">
                <i class="far fa-comment"></i> 12 Comments
              </span>
              <span class="news-details-meta-item">
                <i class="far fa-eye"></i> 240 Views
              </span>
            </div>

            <!-- Title -->
            <h2 class="news-details-article-title">National Tree Plantation Week 2026 Launched</h2>

            <!-- Detailed Content -->
            <div class="news-details-rich-text-wrapper">
              <p>
                Green Earth Foundation has officially kicked off the National Tree Plantation Week 2026 with an ambitious target to plant over 5,000 native saplings across 10 districts in Bangladesh. The campaign is aimed at reducing urban heat islands, combating climate change, and restoring lost ecosystems along riverbanks and main highway pathways.
              </p>
              <p>
                The opening ceremony took place in Dhaka, drawing hundreds of environment activists, school children, community leaders, and government officials. Addressing the gathering, the executive director of the foundation emphasized the absolute necessity of collective civic action in restoring green spaces. "We are not just planting saplings; we are planting the future. A tree planted today is clean air and shaded shelter for decades to come," they noted.
              </p>
              
              <blockquote class="news-details-blockquote">
                "Our target is to not only plant 5,000 trees but also nurture them for three years, ensuring a survival rate of over ninety percent."
                <cite class="news-details-blockquote-author">— Green Earth Conservation Team</cite>
              </blockquote>

              <p>
                The foundation has identified specific native tree species like Neem, Banyan, and Mango that are best suited to the local weather patterns and soil characteristics. Volunteers will also carry out extensive awareness campaigns in residential areas, teaching communities about sustainable irrigation, composting, and tree care methods.
              </p>
              <h3 class="news-details-section-heading">How You Can Participate</h3>
              <p>
                Everyone is invited to take part in this movement. You can support the cause by volunteering during plantation events, adopting a tree in your neighborhood, or donating to provide saplings for school greening campaigns. Together, we can make Bangladesh a green and clean sanctuary.
              </p>
            </div>

            <!-- Tags & Share Row -->
            <div class="news-details-tags-share-row">
              <div class="news-details-tags-wrapper">
                <span class="news-details-tag-title">Tags:</span>
                <a href="#" class="news-details-tag-link">Tree Plantation</a>
                <a href="#" class="news-details-tag-link">Environment</a>
                <a href="#" class="news-details-tag-link">2026</a>
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
            <h3 class="comments-section-title">Comments (3)</h3>
            
            <ul class="news-details-comments-list">
              
              <!-- Comment Item 1 -->
              <li class="news-details-comment-item">
                <div class="comment-author-avatar-box">
                  <i class="fas fa-user-circle"></i>
                </div>
                <div class="comment-content-body">
                  <div class="comment-meta-row">
                    <h5 class="comment-author-name">Rafiqul Islam</h5>
                    <span class="comment-date-lbl">July 06, 2026 at 10:30 AM</span>
                  </div>
                  <p class="comment-text-content">
                    This is an amazing initiative! I want to join the plantation drive in Dhanmondi. How can I register as a volunteer?
                  </p>
                  <a href="#" class="comment-reply-link-btn"><i class="fas fa-reply"></i> Reply</a>
                </div>
              </li>

              <!-- Comment Item 2 (Nested Reply) -->
              <li class="news-details-comment-item nested-reply-item">
                <div class="comment-author-avatar-box">
                  <i class="fas fa-user-circle"></i>
                </div>
                <div class="comment-content-body">
                  <div class="comment-meta-row">
                    <h5 class="comment-author-name">Admin</h5>
                    <span class="comment-date-lbl">July 06, 2026 at 11:15 AM</span>
                  </div>
                  <p class="comment-text-content">
                    Hi Rafiqul, you can click on the "Join Us" button at the top of our page and fill out the volunteer form. Our team will get in touch with you shortly. Thanks for your support!
                  </p>
                  <a href="#" class="comment-reply-link-btn"><i class="fas fa-reply"></i> Reply</a>
                </div>
              </li>

              <!-- Comment Item 3 -->
              <li class="news-details-comment-item">
                <div class="comment-author-avatar-box">
                  <i class="fas fa-user-circle"></i>
                </div>
                <div class="comment-content-body">
                  <div class="comment-meta-row">
                    <h5 class="comment-author-name">Sarah Rahman</h5>
                    <span class="comment-date-lbl">July 07, 2026 at 09:45 AM</span>
                  </div>
                  <p class="comment-text-content">
                    Great choice of planting native tree species like Neem and Banyan. They provide so much benefit compared to exotic ones. Kudos to the Green Earth team!
                  </p>
                  <a href="#" class="comment-reply-link-btn"><i class="fas fa-reply"></i> Reply</a>
                </div>
              </li>

            </ul>

            <!-- Leave a Comment Form -->
            <div class="news-details-reply-form-wrapper">
              <h3 class="reply-form-title">Leave a Reply</h3>
              <p class="reply-form-subtitle">Your email address will not be published. Required fields are marked *</p>
              
              <form class="comment-submit-form" onsubmit="return false;">
                <div class="row g-3">
                  <!-- Name (No custom class on col) -->
                  <div class="col-md-6">
                    <input type="text" class="comment-form-input-field" placeholder="Your Name *" required />
                  </div>
                  <!-- Email (No custom class on col) -->
                  <div class="col-md-6">
                    <input type="email" class="comment-form-input-field" placeholder="Your Email *" required />
                  </div>
                  <!-- Message (No custom class on col) -->
                  <div class="col-12">
                    <textarea class="comment-form-textarea-field" rows="5" placeholder="Your Comment *" required></textarea>
                  </div>
                  <!-- Submit (No custom class on col) -->
                  <div class="col-12">
                    <button type="submit" class="comment-form-submit-btn">Post Comment</button>
                  </div>
                </div>
              </form>
            </div>

          </div>

        </div>

        <!-- Right Column: Sidebar (No class in column div) -->
        <div class="col-lg-4 col-12">
          
          <aside class="news-details-sidebar-wrapper">
            
            <!-- Sidebar Widget: Search -->
            <div class="sidebar-widget-container">
              <h4 class="sidebar-widget-title-heading">Search</h4>
              <form class="sidebar-search-form" onsubmit="return false;">
                <input type="text" class="sidebar-search-input-field" placeholder="Search news..." />
                <button type="submit" class="sidebar-search-submit-btn" aria-label="Search">
                  <i class="fas fa-search"></i>
                </button>
              </form>
            </div>

            <!-- Sidebar Widget: Categories -->
            <div class="sidebar-widget-container">
              <h4 class="sidebar-widget-title-heading">Categories</h4>
              <ul class="sidebar-categories-list">
                <li><a href="#" class="sidebar-category-link">Plantation <span class="category-count-badge">(15)</span></a></li>
                <li><a href="#" class="sidebar-category-link">Conservation <span class="category-count-badge">(8)</span></a></li>
                <li><a href="#" class="sidebar-category-link">Education <span class="category-count-badge">(12)</span></a></li>
                <li><a href="#" class="sidebar-category-link">Wildlife <span class="category-count-badge">(6)</span></a></li>
                <li><a href="#" class="sidebar-category-link">Partnerships <span class="category-count-badge">(4)</span></a></li>
              </ul>
            </div>

            <!-- Sidebar Widget: Recent Posts -->
            <div class="sidebar-widget-container">
              <h4 class="sidebar-widget-title-heading">Recent News</h4>
              <div class="sidebar-recent-posts-list">
                
                <!-- Recent Post 1 -->
                <article class="sidebar-post-item">
                  <div class="sidebar-post-img-box">
                    <img src="{{asset('assets')}}/ima/campaign2.png" alt="MoU Signed Thumbnail" />
                  </div>
                  <div class="sidebar-post-details">
                    <h5 class="sidebar-post-heading-title"><a href="#">MoU Signed with Forest Department</a></h5>
                    <span class="sidebar-post-date"><i class="far fa-calendar-alt"></i> June 28, 2026</span>
                  </div>
                </article>

                <!-- Recent Post 2 -->
                <article class="sidebar-post-item">
                  <div class="sidebar-post-img-box">
                    <img src="{{asset('assets')}}/ima/slider3.webp" alt="Environment Award Thumbnail" />
                  </div>
                  <div class="sidebar-post-details">
                    <h5 class="sidebar-post-heading-title"><a href="#">Green Earth Wins National Environment Award</a></h5>
                    <span class="sidebar-post-date"><i class="far fa-calendar-alt"></i> June 20, 2026</span>
                  </div>
                </article>

                <!-- Recent Post 3 -->
                <article class="sidebar-post-item">
                  <div class="sidebar-post-img-box">
                    <img src="{{asset('assets')}}/ima/campaign4.png" alt="Cleanup Drive Thumbnail" />
                  </div>
                  <div class="sidebar-post-details">
                    <h5 class="sidebar-post-heading-title"><a href="#">Community Cleanup Drive Cleans 5 Tons</a></h5>
                    <span class="sidebar-post-date"><i class="far fa-calendar-alt"></i> June 12, 2026</span>
                  </div>
                </article>

              </div>
            </div>

            <!-- Sidebar Widget: Tags -->
            <div class="sidebar-widget-container">
              <h4 class="sidebar-widget-title-heading">Popular Tags</h4>
              <div class="sidebar-tags-grid">
                <a href="#" class="sidebar-tag-link-item">Forests</a>
                <a href="#" class="sidebar-tag-link-item">Water</a>
                <a href="#" class="sidebar-tag-link-item">Volunteering</a>
                <a href="#" class="sidebar-tag-link-item">Climate Change</a>
                <a href="#" class="sidebar-tag-link-item">Composting</a>
                <a href="#" class="sidebar-tag-link-item">Recycling</a>
              </div>
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
