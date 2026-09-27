@extends(welcomeTheme().'layouts.app')

@section('title')
<title>Sign Up — Bangladesh River Environment Protection Rights Society</title>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/about.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/auth.css')}}" />
@endpush

@section('contents')
  <!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="about-header-banner">
    <div class="container">
      <h1 class="about-banner-title">Member Registration</h1>
      <div class="about-banner-crumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <span class="text-white">Sign Up</span>
      </div>
    </div>
  </section>

  <!-- ========== SIGN UP FORM SECTION ========== -->
  <section class="auth-main-sec">
    <div class="container">
      <div class="auth-card-wrap">
        <div class="auth-card">
          <div class="auth-card-header">
            <span class="auth-badge">MEMBER REGISTRATION</span>
            <h2 class="auth-card-title">Join BREPRS Society</h2>
            <p class="auth-card-subtitle">
              Register your profile to participate in our river protection initiatives, volunteer drives, and social welfare programs.
            </p>
          </div>

          @if(session('success'))
          <div class="alert alert-success py-2 mb-3 small">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
          </div>
          @endif

          @if(session('error'))
          <div class="alert alert-danger py-2 mb-3 small">
            <i class="fas fa-exclamation-circle me-1"></i> {{ session('error') }}
          </div>
          @endif

          @if($errors->any())
          <div class="alert alert-danger py-2 mb-3 small">
            <ul class="mb-0 ps-3">
              @foreach($errors->all() as $err)
                <li>{{$err}}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="row g-3">
              <!-- Full Name Field -->
              <div class="col-md-6 col-12">
                <div class="auth-input-group">
                  <label for="fullNameInput" class="auth-input-label">Full Name <span class="text-danger">*</span></label>
                  <div class="auth-input-icon-box">
                    <input type="text" id="fullNameInput" name="name" value="{{old('name')}}" class="auth-input-field"
                      placeholder="Enter your full name" required />
                    <i class="fas fa-user auth-input-icon"></i>
                  </div>
                </div>
              </div>

              <!-- Mobile Number Field -->
              <div class="col-md-6 col-12">
                <div class="auth-input-group">
                  <label for="mobileInput" class="auth-input-label">Mobile Number <span class="text-danger">*</span></label>
                  <div class="auth-input-icon-box">
                    <input type="tel" id="mobileInput" name="mobile" value="{{old('mobile')}}" class="auth-input-field"
                      placeholder="+880 17XX-XXXXXX" required />
                    <i class="fas fa-phone-alt auth-input-icon"></i>
                  </div>
                </div>
              </div>

              <!-- Email Address Field -->
              <div class="col-12">
                <div class="auth-input-group">
                  <label for="emailInput" class="auth-input-label">Email Address <span class="text-danger">*</span></label>
                  <div class="auth-input-icon-box">
                    <input type="email" id="emailInput" name="email" value="{{old('email')}}" class="auth-input-field"
                      placeholder="name@domain.com" required />
                    <i class="fas fa-envelope auth-input-icon"></i>
                  </div>
                </div>
              </div>

              <!-- Physical Address Field -->
              <div class="col-12">
                <div class="auth-input-group">
                  <label for="addressInput" class="auth-input-label">Address</label>
                  <div class="auth-input-icon-box">
                    <textarea id="addressInput" name="address" class="auth-input-field auth-input-textarea"
                      placeholder="Enter your village/house, road, upazila/thana, district...">{{old('address')}}</textarea>
                    <i class="fas fa-location-dot auth-input-icon"></i>
                  </div>
                </div>
              </div>

              <!-- Password Field -->
              <div class="col-md-6 col-12">
                <div class="auth-input-group">
                  <label for="passwordInput" class="auth-input-label">Password <span class="text-danger">*</span></label>
                  <div class="auth-input-icon-box">
                    <input type="password" id="passwordInput" name="password" class="auth-input-field"
                      placeholder="Create a password" required />
                    <i class="fas fa-lock auth-input-icon"></i>
                  </div>
                </div>
              </div>

              <!-- Confirm Password Field -->
              <div class="col-md-6 col-12">
                <div class="auth-input-group">
                  <label for="confirmPasswordInput" class="auth-input-label">Confirm Password <span class="text-danger">*</span></label>
                  <div class="auth-input-icon-box">
                    <input type="password" id="confirmPasswordInput" name="password_confirmation" class="auth-input-field"
                      placeholder="Re-enter password" required />
                    <i class="fas fa-lock auth-input-icon"></i>
                  </div>
                </div>
              </div>
            </div>

            <!-- Terms Agreement -->
            <div class="auth-flex-options mt-2">
              <div class="auth-form-check">
                <input type="checkbox" id="termsCheck" class="auth-check-input" required checked />
                <label for="termsCheck" class="auth-check-label">
                  I agree to the <a href="#" class="auth-link">Terms &amp; Conditions</a> and <a href="#" class="auth-link">Privacy Policy</a>.
                </label>
              </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="auth-submit-btn">
              <i class="fas fa-user-plus"></i> Register Account
            </button>
          </form>

          <!-- Footer Switch to Login -->
          <div class="auth-card-footer">
            Already have an account? <a href="{{route('login')}}">Sign In</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
