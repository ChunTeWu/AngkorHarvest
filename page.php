<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AngkorHarvest
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php  
		if (has_post_thumbnail()) :
			?>

			<section class="top-section" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
				<?php the_title( '<h1>', '</h1>' ); ?>

			</section>


			<?php
		else:
			?>
			<!-- added a indent so wont be covered by nav -->
			<div style="margin-top:65px"></div>
			<?php
		endif;
		?>
		

		<div class="page-content s-line">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			<button><a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>">Join Us</button>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	get_footer();
