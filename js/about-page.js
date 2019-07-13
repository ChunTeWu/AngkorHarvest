jQuery(document).ready(function($){
  $companyLink = $('#companyLink');
  $companySection = $('.company');

  $familyLink = $('#familyLink');
  $familySection = $('.my-family');

  $missionLink = $('#missionLink');
  $missionSection = $('.mission');

  $aboutPage = $('.page-about');

  $companyLink.on('click', function(){
    $companySection.fadeIn();
    $familySection.fadeOut();
    $missionSection.fadeOut();
  });

  $familyLink.on('click', function(){
    $companySection.fadeOut();
    $familySection.fadeIn();
    $missionSection.fadeOut();
  });

  $missionLink.on('click', function(){
    $companySection.fadeOut();
    $familySection.fadeOut();
    $missionSection.fadeIn();
  });

  $('#missionLink').click(function(){
    $(this).addClass('visited');
    $familyLink.removeClass('visited');
    $companyLink.addClass('brown');
  });

  $('#companyLink').click(function(){
    $(this).addClass('visited');
    $(this).removeClass('brown');
    $familyLink.removeClass('visited');
    $missionLink.removeClass('visited');
  });

  $('#familyLink').click(function(){
    $(this).addClass('visited');
    $missionLink.removeClass('visited');
    $companyLink.addClass('brown');
  });

  $('.company button a').on('click', function(e){
    e.preventDefault();
    $('html, body').animate({
        scrollTop: 0,
    }, 500);
  });

  $('.my-family button a').on('click', function(e){
    e.preventDefault();
    $('html, body').animate({
        scrollTop: 0,
    }, 500);
  });

  $('.mission button a').on('click', function(e){
    e.preventDefault();
    $('html, body').animate({
        scrollTop: 0,
    }, 500);
  });

});
