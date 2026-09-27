/**
 * ============================================
 * GREEN EARTH NGO - SLIDER & INTERACTIONS
 * Hero Carousel, Scroll Animations, Back to Top
 * ============================================
 */

document.addEventListener('DOMContentLoaded', function () {

  /* ---- 1. Hero Carousel Initialization ---- */
  const heroCarouselEl = document.getElementById('heroCarousel');

  if (heroCarouselEl) {
    // Initialize Bootstrap Carousel with custom options
    const heroCarousel = new bootstrap.Carousel(heroCarouselEl, {
      interval: 6000,
      ride: 'carousel',
      wrap: true,
      pause: 'hover',
      touch: true
    });

    // Smooth height transition when slides have different dimensions
    const carouselInner = heroCarouselEl.querySelector('.carousel-inner');
    if (carouselInner) {
      // Calculate dynamic height based on client width and natural aspect ratio
      const updateHeight = function (img) {
        if (img && img.naturalWidth) {
          const aspectHeight = (carouselInner.clientWidth / img.naturalWidth) * img.naturalHeight;
          carouselInner.style.height = aspectHeight + 'px';
        } else if (img) {
          carouselInner.style.height = img.clientHeight + 'px';
        }
      };

      // Set initial height
      const activeImg = carouselInner.querySelector('.carousel-item.active img');
      if (activeImg) {
        if (activeImg.complete) {
          updateHeight(activeImg);
        } else {
          activeImg.addEventListener('load', function() {
            updateHeight(activeImg);
          });
        }
      }

      // Re-trigger slide-in animations and adjust height on each slide change
      heroCarouselEl.addEventListener('slide.bs.carousel', function (event) {
        const nextSlide = event.relatedTarget;
        const nextImg = nextSlide.querySelector('img');
        if (nextImg) {
          updateHeight(nextImg);
        }

        const animatedElements = nextSlide.querySelectorAll(
          '.hero-slide-badge, .hero-slide-title, .hero-slide-description, .hero-slide-actions, .hero-slide-metrics-row'
        );

        // Reset animations before transitioning
        animatedElements.forEach(function (el) {
          el.style.opacity = '0';
          el.style.transform = 'translateY(40px)';
        });
      });

      // Handle window resize to keep height in sync
      window.addEventListener('resize', function() {
        const activeImg = carouselInner.querySelector('.carousel-item.active img');
        updateHeight(activeImg);
      });
    }

    heroCarouselEl.addEventListener('slid.bs.carousel', function (event) {
      const activeSlide = event.relatedTarget;
      const animatedElements = activeSlide.querySelectorAll(
        '.hero-slide-badge, .hero-slide-title, .hero-slide-description, .hero-slide-actions, .hero-slide-metrics-row'
      );

      // Staggered fade-in for each element
      animatedElements.forEach(function (el, index) {
        setTimeout(function () {
          el.style.opacity = '1';
          el.style.transform = 'translateY(0)';
        }, 200 + (index * 200));
      });
    });

    // Keyboard navigation for accessibility
    document.addEventListener('keydown', function (event) {
      if (event.key === 'ArrowLeft') {
        heroCarousel.prev();
      } else if (event.key === 'ArrowRight') {
        heroCarousel.next();
      }
    });
  }

  /* ---- 2. Scroll Animations (Intersection Observer) ---- */
  const animatedElements = document.querySelectorAll('.animate-fade-up');

  if ('IntersectionObserver' in window) {
    const observerOptions = {
      root: null,
      rootMargin: '0px 0px -80px 0px',
      threshold: 0.1
    };

    const animationObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry, index) {
        if (entry.isIntersecting) {
          // Add staggered delay based on sibling index
          const siblings = entry.target.closest('.row')
            ? entry.target.closest('.row').querySelectorAll('.animate-fade-up')
            : [entry.target];
          const siblingIndex = Array.from(siblings).indexOf(entry.target);

          setTimeout(function () {
            entry.target.classList.add('animated');
          }, siblingIndex * 150);

          animationObserver.unobserve(entry.target);
        }
      });
    }, observerOptions);

    animatedElements.forEach(function (el) {
      animationObserver.observe(el);
    });
  } else {
    // Fallback for older browsers
    animatedElements.forEach(function (el) {
      el.classList.add('animated');
    });
  }

  /* ---- 3. Back to Top Button ---- */
  const backToTopBtn = document.getElementById('backToTopBtn');

  if (backToTopBtn) {
    // Show/hide button based on scroll position
    window.addEventListener('scroll', function () {
      if (window.scrollY > 500) {
        backToTopBtn.classList.add('visible');
      } else {
        backToTopBtn.classList.remove('visible');
      }
    });

    // Smooth scroll to top on click
    backToTopBtn.addEventListener('click', function () {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }

  /* ---- 4. Navbar Scroll Effect ---- */
  const navbar = document.querySelector('.navbar-ngo');

  if (navbar) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 100) {
        navbar.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.1)';
      } else {
        navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.06)';
      }
    });
  }

  /* ---- 5. Smooth Scroll for Anchor Links ---- */
  const anchorLinks = document.querySelectorAll('a[href^="#"]');

  anchorLinks.forEach(function (link) {
    link.addEventListener('click', function (event) {
      const targetId = this.getAttribute('href');

      // Skip if it's just "#"
      if (targetId === '#') return;

      const targetEl = document.querySelector(targetId);

      if (targetEl) {
        event.preventDefault();

        // Close mobile navbar (collapse or offcanvas) if open
        const navbarMenu = document.getElementById('navbarMainMenu');
        if (navbarMenu && navbarMenu.classList.contains('show')) {
          // Collapse Hider
          const bsCollapse = bootstrap.Collapse.getInstance(navbarMenu);
          if (bsCollapse) {
            bsCollapse.hide();
          }
          // Offcanvas Hider
          const bsOffcanvas = bootstrap.Offcanvas.getInstance(navbarMenu);
          if (bsOffcanvas) {
            bsOffcanvas.hide();
          }
        }

        // Calculate offset (account for sticky navbar)
        const navbarHeight = navbar ? navbar.offsetHeight : 0;
        const targetPosition = targetEl.getBoundingClientRect().top + window.scrollY - navbarHeight;

        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }
    });
  });

  /* ---- 6. Active Nav Link on Scroll ---- */
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.navbar-ngo .nav-link:not(.navbar-action-btn)');

  function updateActiveNav() {
    const scrollPos = window.scrollY + 150;

    sections.forEach(function (section) {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;
      const sectionId = section.getAttribute('id');

      if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
        navLinks.forEach(function (link) {
          link.classList.remove('active');
          if (link.getAttribute('href') === '#' + sectionId) {
            link.classList.add('active');
          }
        });
      }
    });

    // If at top of page, set Home as active
    if (window.scrollY < 200) {
      navLinks.forEach(function (link) {
        link.classList.remove('active');
      });
      const homeLink = document.querySelector('.navbar-ngo .nav-link[href="index.html"]');
      if (homeLink) {
        homeLink.classList.add('active');
      }
    }
  }

  window.addEventListener('scroll', updateActiveNav);

  /* ---- 7. Counter Animation for Stats ---- */
  const counterElements = document.querySelectorAll('.stats-card-num-flat');
  let countersAnimated = false;

  function animateCounters() {
    if (countersAnimated) return;

    counterElements.forEach(function (counter) {
      // Extract numeric value from text content
      const text = counter.textContent;
      const numericMatch = text.match(/[\d,]+/);
      if (!numericMatch) return;

      const targetValue = parseInt(numericMatch[0].replace(/,/g, ''), 10);
      const suffix = text.replace(numericMatch[0], '');
      const duration = 2000;
      const startTime = performance.now();

      function updateCounter(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);

        // Ease out cubic for smooth deceleration
        const easedProgress = 1 - Math.pow(1 - progress, 3);
        const currentValue = Math.floor(easedProgress * targetValue);

        // Format number with commas
        const formattedValue = currentValue.toLocaleString('en-US');
        counter.innerHTML = formattedValue + '<span>' + suffix + '</span>';

        if (progress < 1) {
          requestAnimationFrame(updateCounter);
        } else {
          // Ensure final value is exact
          counter.innerHTML = targetValue.toLocaleString('en-US') + '<span>' + suffix + '</span>';
        }
      }

      requestAnimationFrame(updateCounter);
    });

    countersAnimated = true;
  }

  // Trigger counter animation when stats section is in view
  const statsSection = document.querySelector('.stats-counter-section');

  if (statsSection && 'IntersectionObserver' in window) {
    const counterObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateCounters();
          counterObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });

    counterObserver.observe(statsSection);
  }

  /* ---- 8. Campaign Progress Bar Animation ---- */
  const progressBars = document.querySelectorAll('.campaign-progress-bar-fill');

  if (progressBars.length > 0 && 'IntersectionObserver' in window) {
    progressBars.forEach(function (bar) {
      // Store the target width and reset to 0
      const targetWidth = bar.style.width;
      bar.style.width = '0%';

      const progressObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            // Animate to target width
            setTimeout(function () {
              bar.style.width = targetWidth;
            }, 300);
            progressObserver.unobserve(entry.target);
          }
        });
      }, { threshold: 0.5 });

      progressObserver.observe(bar);
    });
  }

});
