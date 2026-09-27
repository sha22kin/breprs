<!-- ========== TOP BAR ========== -->
<div class="topbar-container">
  <div class="container">
    <div class="row align-items-center">
      <!-- Contact Info -->
      <div class="col-lg-8 col-md-7">
        <div class="topbar-contact-list">
          <span class="topbar-contact-item">
            <i class="fas fa-phone-alt"></i>
            <a href="tel:{{general()->mobile}}">{{general()->mobile}}</a>
          </span>
          <span class="topbar-contact-item">
            <i class="fas fa-envelope"></i>
            <a href="mailto:{{general()->email}}">{{general()->email}}</a>
          </span>
          <span class="topbar-contact-item">
            <i class="fas fa-map-marker-alt"></i>
            {{general()->address_one}}
          </span>
        </div>
      </div>
      <!-- Social Links -->
      <div class="col-lg-4 col-md-5">
        <div class="topbar-right-wrapper">
          <div class="topbar-social-list">
            <a href="{{general()->facebook_link ?: '#'}}" class="topbar-social-link" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="{{general()->twitter_link ?: '#'}}" class="topbar-social-link" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="{{general()->instagram_link ?: '#'}}" class="topbar-social-link" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="{{general()->youtube_link ?: '#'}}" class="topbar-social-link" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            <a href="{{general()->linkedin_link ?: '#'}}" class="topbar-social-link" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ========== NAVBAR ========== -->
<nav class="navbar navbar-expand-lg navbar-ngo">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand-wrapper" href="{{route('index')}}">
      <img src="{{asset('assets/ima/logo.webp')}}" alt="BREPRS Logo" class="navbar-brand-logo-img" />
    </a>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarMainMenu"
      aria-controls="navbarMainMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Offcanvas Mobile Drawer Menu (Slides from Left) -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarMainMenu" aria-labelledby="navbarMainMenuLabel">
      <div class="offcanvas-header">
        <a class="navbar-brand-wrapper" href="{{route('index')}}">
          <img src="{{asset('assets/ima/logo.webp')}}" alt="BREPRS Logo" class="navbar-brand-logo-img"
            style="height: 50px;" />
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          @if($headerMenu = menu('Header Menus'))
            @foreach($headerMenu->MenuItems->where('parent_id', $headerMenu->id) as $menuItem)
              @if($menuItem->subMenus->count() > 0)
              {{-- Dropdown Menu Item --}}
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  {{$menuItem->menuName() ?: $menuItem->name}} <i class="fas fa-chevron-down ms-1 small"></i>
                </a>
                <ul class="dropdown-menu">
                  @foreach($menuItem->subMenus as $subItem)
                  <li><a class="dropdown-item" href="{{$subItem->menuLink() ? url($subItem->menuLink()) : '#'}}">{{$subItem->menuName() ?: $subItem->name}}</a></li>
                  @endforeach
                </ul>
              </li>
              @else
              {{-- Single Menu Item --}}
              <li class="nav-item">
                <a class="nav-link" href="{{$menuItem->menuLink() ? url($menuItem->menuLink()) : '#'}}">{{$menuItem->menuName() ?: $menuItem->name}}</a>
              </li>
              @endif
            @endforeach
          @else
            {{-- Fallback hardcoded menu if no dynamic menu exists --}}
            <li class="nav-item">
              <a class="nav-link {{request()->routeIs('index') ? 'active' : ''}}" href="{{route('index')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{request()->routeIs('about*') ? 'active' : ''}}" href="{{route('about')}}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{request()->routeIs('contact*') ? 'active' : ''}}" href="{{route('contact')}}">Contact</a>
            </li>
          @endif
          <li class="nav-item ms-lg-2">
            <a class="nav-link navbar-action-btn" href="{{route('volunteer')}}">
              <i class="fas fa-hand-holding-heart"></i> Join Us
            </a>
          </li>
          @auth
          <li class="nav-item ms-lg-2">
            <a class="nav-link" href="{{route('admin.dashboard')}}" title="Admin Dashboard">
              <i class="fas fa-user-shield"></i> Admin
            </a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </div>
</nav>
