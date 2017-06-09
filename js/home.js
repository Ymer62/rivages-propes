// Carousel
var timerCarousel;

function carouselInit(){
  try{
    $('.carousel.carousel-slider').carousel({fullWidth: true});
  } catch(e) {}
}

function carouselPlay(){
  clearInterval(timerCarousel);
  timerCarousel = setInterval(function() { $('.carousel').carousel('next'); }, 3500);
}

$(document).ready(function(){
  function carouselSize(){
    $('.carousel').height($(window).height() - $('.nav-wrapper').height());
  }

  $(window).resize(function(){
    carouselSize();
  });
  setTimeout(carouselSize, 500);
  // carouselSize();

  carouselInit();
});
