jQuery(document).ready(function($){
  $('.image-slider').slick({
  		slidesToShow: 1,
  		autoplay: true,
  		autoplaySpeed: 4000,
  		arrows: false,
  		draggable: false,
  		fade: true,
  		speed: 3000,
  });

  $('.link-product button a').on('mouseenter', function(){
    $('.link-product').addClass('zoomImage');
  });
  $('.link-product button a').on('mouseout', function(){
    $('.link-product').removeClass('zoomImage');
  });
});
	