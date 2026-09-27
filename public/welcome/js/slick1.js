$(document).ready(function () {
  const $projectsSlider = $('.projects-slider');

  if ($projectsSlider.length > 0) {
    // Initialize Projects Slick Slider with Center Mode
    $projectsSlider.slick({
      centerMode: true,
      centerPadding: '0px',
      slidesToShow: 3,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 600,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
      dots: true,
      dotsClass: 'slick-dots',
      responsive: [
        {
          breakpoint: 991.98,
          settings: {
            slidesToShow: 2,
            centerMode: true,
            centerPadding: '0px'
          }
        },
        {
          breakpoint: 767.98,
          settings: {
            slidesToShow: 1,
            centerMode: true,
            centerPadding: '50px'
          }
        },
        {
          breakpoint: 575.98,
          settings: {
            slidesToShow: 1,
            centerMode: true,
            centerPadding: '20px'
          }
        }
      ]
    });
  }

  const $storiesSlider = $('.stories-slider');

  if ($storiesSlider.length > 0) {
    // Initialize Stories Slick Slider
    $storiesSlider.slick({
      dots: true,
      infinite: true,
      speed: 600,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
      responsive: [
        {
          breakpoint: 991.98,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 767.98,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });
  }
});
