<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{csrf_token()}}" />
  @yield('SEO')
  @yield('title')
  @if(!View::hasSection('title'))
    <title>{{websiteTitle()}}</title>
  @endif

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/ima/logo.webp')}}" />

  <!-- Google Fonts (Poppins) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Slick Slider CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

  <!-- Custom Stylesheet -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />

  @stack('css')
  <style>
    html, body {
      overflow-x: hidden;
      max-width: 100%;
    }
  </style>
</head>
<body>

  <!-- ========== TOP BAR & NAVBAR ========== -->
  @include(welcomeTheme().'layouts.header')

  <!-- ========== MAIN CONTENT ========== -->
  @yield('contents')

  <!-- ========== FOOTER ========== -->
  @include(welcomeTheme().'layouts.footer')

  <!-- ========== BACK TO TOP ========== -->
  <button id="backToTopBtn" class="back-to-top-btn" aria-label="Back to top">
    <i class="fas fa-chevron-up"></i>
  </button>

  <!-- jQuery (Required for Slick) -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <!-- Slick Slider JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

  <!-- Bootstrap 5 JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom Slider JS -->
  <script src="{{asset('assets/js/slider.js')}}"></script>

  <!-- Custom Slick Projects JS -->
  <script src="{{asset('assets/js/slick1.js')}}"></script>

  <!-- Google Translator JS -->
  <script src="{{asset('assets/js/translator.js')}}"></script>

  @if(session('success'))
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
    <div class="toast show align-items-center text-bg-success border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          <i class="fas fa-check-circle me-2"></i> {!! session('success') !!}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
  @endif

  @if(session('error'))
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
    <div class="toast show align-items-center text-bg-danger border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          <i class="fas fa-exclamation-circle me-2"></i> {!! session('error') !!}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
  @endif

  @stack('js')
</body>
</html>
