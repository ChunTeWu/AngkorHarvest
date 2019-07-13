jQuery(document).ready(function($){
	var $galleryWidth = $('.first-img-wrapper').width();
	var $thumbnailHeight = $('.thumbnail-gallery').width();

	$('.thumbnail-gallery .thumbnail-wrapper').each(function(){	
		$(this).on('click', function(){
			var theUrl = $('span', this).text();

			$('.first-img-wrapper img').fadeOut(500);

			setTimeout(function(){
				$('#main-gallery-image').attr("src", theUrl);
				$('.first-img-wrapper img').fadeIn(500);
			},499);
			

			
			
			
		});

	});

	if ($galleryWidth > $thumbnailHeight) {
		$('.gallery').height($galleryWidth);
	}else{
		$('.gallery').height($thumbnailHeight);
	}

	
	$(window).resize(function(){
		var $galleryWidth = $('.first-img-wrapper').width();
		$('.gallery').height($galleryWidth);
		// console.log($galleryWidth);
	});
	
});
	