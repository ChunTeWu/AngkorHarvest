<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AngkorHarvest
 */

get_header(); ?>

<div id="primary" class="content-area">

	<?php
	if ( have_posts() ) :
		get_template_part( 'template-parts/content', 'product' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; 
	?>

</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
