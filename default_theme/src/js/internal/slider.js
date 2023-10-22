export default class Slider {
  init() {
    $(".slider-default").slick({
      infinite: false,
      slidesToShow: 3,
      slidesToScroll: 2,
      arrows: false,
      variableWidth: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: false,
          },
        },
      ],
    });

    // Carousel Hero
    $('.hero-carousel').slick({
      arrows: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      infinite: true,
      cssEase: 'linear',
      variableWidth: true,
      variableHeight: true,
      prevArrow: $('.prev'),
      nextArrow: $('.next'),
    });
  }
}
