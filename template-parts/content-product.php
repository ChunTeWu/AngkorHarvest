<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AngkorHarvest
 */

?>

<main id="main" <?php post_class('site-main page-product-detail s-line');?>>
	<div class="small-nav">
		<?php
		$terms = get_the_terms( $post->ID, 'product-category' );
		foreach($terms as $term) {
			$the_taxonomy = $term->name;
		}
	    // echo $the_taxonomy;

		?>
		<a href="<?php echo home_url(); ?>/products/">Products</a>
		<p>	&gt;</p>
		<a href='<?php echo home_url(); ?>/product-categories/<?php echo $the_taxonomy; ?>'><?php echo $the_taxonomy; ?></a>
		<p>	&gt;</p>
		<?php the_title('<p>', '</p>'); ?>
		
	</div>

	<section class="detail-content">
		<div class="entire-gallery">
			<div class="gallery">
				<?php

				if ( have_rows('image_gallery') ) :
					$main_field = get_field('image_gallery');
				// $first_img = $main_field[0]['gallery_image']['url'];
					$gallery_first_img = $main_field[0]['gallery_image']['sizes']['large-image-square'];
					?>
					<div class="first-img-wrapper">

						<img src="<?php echo $gallery_first_img; ?>" alt="" id="main-gallery-image">

					</div>

					<?php
				endif;
				?>

				<div class="thumbnail-gallery">
					<?php
					if ( have_rows('image_gallery') ) :
						while ( have_rows('image_gallery') ) : the_row();
							$product_image_gallery = get_sub_field('gallery_image');
							?>
							<div class="thumbnail-wrapper">
								<img src="<?php echo $product_image_gallery['sizes']['thumbnail']; ?>" alt="<?php echo $product_image_gallery; ?>" />
								<span class="hidden-url"><?php echo $product_image_gallery['sizes']['large-image-square']; ?></span>

							</div>
							<?php
						endwhile;
					else:
					endif;
					?>

				</div>
			</div>

			<div class="awards">
				<?php
				if ( have_rows('awards') ) :
					while ( have_rows('awards') ) : the_row();
						$product_award = get_sub_field('award_icon');
						?>
						<img src="<?php echo $product_award['sizes']['thumbnail']; ?>" alt="<?php echo $product_award; ?>" />
						<?php
					endwhile;
				else:
				endif;
				?>

			</div>

		</div>

		<div class="product-detail">
			<?php the_title( '<h2>', '</h2>' ); ?>
			<?php the_field('product_description'); ?>
			<div class="mobile-awards">
				<?php
				if ( have_rows('awards') ) :
					while ( have_rows('awards') ) : the_row();
						$product_award = get_sub_field('award_icon');
						?>
						<img src="<?php echo $product_award['sizes']['thumbnail']; ?>" alt="<?php echo $product_award; ?>" />
						<?php
					endwhile;
				else:
				endif;
				?>

			</div>
			<button><a href="<?php echo home_url(); ?>/category/recipe/">Recipes</a></button>
			<button><a href="<?php echo home_url(); ?>/product-categories/<?php echo $the_taxonomy; ?>">Other <?php echo $the_taxonomy; ?></a></button>
			<button><a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>">Contact</a></button>

		</div>






	</section>

	<?php




	?>







</main><!-- #main -->
