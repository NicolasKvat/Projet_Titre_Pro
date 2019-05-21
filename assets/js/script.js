$(function (){
  // menu burger
  $('#wrapper').click(function () {
    $('.icon').toggleClass('close');
  });
  // carousel
  $('.owl-carousel').owlCarousel({
    items:1,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true
  });
});
