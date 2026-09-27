@extends(welcomeTheme().'layouts.app')

@section('title')
<title>Login — Bangladesh River Environment Protection Rights Society</title>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/about.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/auth.css')}}" />
@endpush

@section('contents')
  <!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="about-header-banner">
    <div class="container">
      <h1 class="about-banner-title">Account Login</h1>
      <div class="about-banner-crumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <span class="text-white">Login</span>
      </div>
    </div>
  </section>

  <!-- ========== LOGIN FORM SECTION ========== -->
  <section class="auth-main-sec">
    <div class="container">
      <div class="auth-card-wrap-sm">
        <div class="auth-card">
          <div class="auth-card-header">
            <span class="auth-badge">MEMBER PORTAL</span>
            <h2 class="auth-card-title">Welcome Back</h2>
            <p class="auth-card-subtitle">
              Enter your mobile number or email to access your BREPRS portal account.
            </p>
          </div>

          @if(session('loginfail') || session('loginfailP') || session('error'))
          <div class="alert alert-danger py-2 mb-3 small">
            <i class="fas fa-exclamation-circle me-1"></i> {{ session('loginfail') ?: (session('loginfailP') ?: session('error')) }}
          </div>
          @endif

          @if(session('success'))
          <div class="alert alert-success py-2 mb-3 small">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
          </div>
          @endif

          <form action="{{route('login')}}" method="POST">
            @csrf

            <!-- Login ID Field (Email or Mobile) -->
            <div class="auth-input-group">
              <label for="loginIdInput" class="auth-input-label">Email or Mobile Number <span class="text-danger">*</span></label>
              <div class="auth-input-icon-box">
                <input type="text" id="loginIdInput" name="username" value="{{old('username')}}" class="auth-input-field"
                  placeholder="Enter registered mobile or email" required autofocus />
                <i class="fas fa-user-circle auth-input-icon"></i>
              </div>
              @error('username')
              <div class="text-danger small mt-1">{{$message}}</div>
              @enderror
            </div>

            <!-- Password Field -->
            <div class="auth-input-group">
              <label for="loginPasswordInput" class="auth-input-label">Password <span class="text-danger">*</span></label>
              <div class="auth-input-icon-box">
                <input type="password" id="loginPasswordInput" name="password" class="auth-input-field"
                  placeholder="Enter your password" required />
                <i class="fas fa-lock auth-input-icon"></i>
              </div>
              @error('password')
              <div class="text-danger small mt-1">{{$message}}</div>
              @enderror
            </div>

            <!-- Remember Me & Forgot Password Options -->
            <div class="auth-flex-options">
              <div class="auth-form-check">
                <input type="checkbox" id="rememberMeCheck" name="remember" value="1" class="auth-check-input" {{old('remember') ? 'checked' : ''}} />
                <label for="rememberMeCheck" class="auth-check-label">Remember Me</label>
              </div>
              <a href="{{route('forgotPassword')}}" class="auth-link">Forgot Password?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="auth-submit-btn">
              <i class="fas fa-right-to-bracket"></i> Sign In to Account
            </button>
          </form>

          <!-- Footer Switch to Register -->
          <div class="auth-card-footer">
            Don't have an account yet? <a href="{{route('register')}}">Register Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
