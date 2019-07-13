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
		<section class="top-section" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
			<?php the_title( '<h1>', '</h1>' ); ?>

		</section>
		<section class="contact s-line">
			<?php 
			echo do_shortcode('[wpforms id="77"]');
			?>

			<div class="contact-info">
				<?php 
				$email = get_field( "email" );
				$address = get_field( "address" );
				$phone_number = get_field( "phone_number" );
				?>
				<h2>Contact Information</h2>
				<h4>Email :</h4>
				<p><?php echo $email; ?></p>
				<h4>Address :</h4>
				<p><?php echo $address; ?></p>
				<h4>Phone Number :</h4>
				<p><?php echo $phone_number; ?></p>
				
			</div>
			
		</section>

		<section class="map">
			<!-- working -->
		</section>

		

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
