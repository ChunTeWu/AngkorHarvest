<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AngkorHarvest
 */

?>


<main id="main" <?php post_class('site-main page-about'); ?>>
	<!-- about -->
	<section class="top-section" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
		<?php the_title( '<h1>', '</h1>' ); ?>

	</section>

	<div class="sub-nav">
		<h2 id="companyLink">Company</h2>
		<h2 id="familyLink">Me &amp; My Family</h2>
		<h2 id="missionLink">Mission</h2>
	</div>

	<!-- company section -->
	<section class="company s-line">
		<?php
		if ( have_rows('company_articles') ) :
			while ( have_rows('company_articles') ) : the_row();
				$company_article_image = get_sub_field('company_article_image');
				$company_article_image_description = get_sub_field('company_article_image_description');
				$company_article_content = get_sub_field('company_article_content');
				$company_image_url = wp_get_attachment_url( $company_article_image );
				?>
				<div class="left-right-wrapper">
					<div class="left-right-content">
						<figure class="img-part">
							<img src="<?php echo $company_image_url; ?>" alt="<?php echo $company_article_image_description; ?>" />
							<figcaption>
								<?php echo $company_article_image_description; ?>
							</figcaption>
						</figure>
						<div class="text-part">
							<?php echo $company_article_content; ?>
						</div>
					</div>
				</div>
				<?php
			endwhile;
		else:
			// echo "There is no articles la";
		endif;
		?>
		
		<button><a href="#">Back To Top</a></button>
	</section>


	<!-- Me & My family -->
	<section class="my-family s-line">
		<?php
		if ( have_rows('our_articles') ) :
			while ( have_rows('our_articles') ) : the_row();
				$our_article_image = get_sub_field('our_article_image');
				$our_article_image_description = get_sub_field('our_article_image_description');
				$our_article_content = get_sub_field('our_article_content');
				$our_article_image_url = wp_get_attachment_url( $our_article_image );
				?>
				<div class="left-right-wrapper">
					<div class="left-right-content">
						<figure class="img-part">
							<img src="<?php echo $our_article_image_url; ?>" alt="<?php echo $our_article_image_description; ?>" />
							<figcaption>
								<?php echo $our_article_image_description; ?>
							</figcaption>
						</figure>
						<div class="text-part">
							<?php echo $our_article_content; ?>
						</div>
					</div>
				</div>
				<?php
			endwhile;
		else:
				// echo "There is no articles la";
		endif;
		?>

		<button><a href="#">Back To Top</a></button>
	</section>


	<!-- Mission -->

	<section class="mission s-line">

		<?php
		if ( have_rows('mission_articles') ) :
			while ( have_rows('mission_articles') ) : the_row();
				$mission_article_image = get_sub_field('mission_article_image');
				$mission_article_image_description = get_sub_field('mission_article_image_description');
				$mission_article_content = get_sub_field('mission_article_content');
				$mission_article_image_url = wp_get_attachment_url( $mission_article_image );
				?>
				<div class="left-right-wrapper">
					<div class="left-right-content">
						<figure class="img-part">
							<img src="<?php echo $mission_article_image_url; ?>" alt="<?php echo $mission_article_image_description; ?>" />
							<figcaption>
								<?php echo $mission_article_image_description; ?>
							</figcaption>
						</figure>
						<div class="text-part">
							<?php echo $mission_article_content; ?>
						</div>

					</div>
				</div>
				<?php
			endwhile;
		else:
				// echo "There is no articles la";
		endif;
		?>

		<button><a href="#">Back To Top</a></button>
	</section>
</main><!-- #main -->

