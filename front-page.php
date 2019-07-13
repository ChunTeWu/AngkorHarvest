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

		<!-- hero slider section -->
		<section class="slider-section">

			<?php
			//The text on the sloder
			$upper_title = get_field( "upper_title" );
			$center_title = get_field( "center_title" );
			$lower_title = get_field( "lower_title" );
			?>
			<div class="title-wrapper">

				<h2 id="upper-title"><?php echo $upper_title; ?></h2>
				<h1 id="center-title"><?php echo $center_title; ?></h1>
				<h2 id="lower-title"><?php echo $lower_title; ?></h2>
			</div>

			<div class="image-slider">
				<?php
					//slider image
					// check if the repeater field has rows of data
				if(have_posts()): 
					if( have_rows('image_slider') ):

					 	// loop through the rows of data
						while ( have_rows('image_slider') ) : the_row();

					        // vars
							$slider_img = get_sub_field('hero_image'); 
							$width = $slider_img['sizes'][ 'width' ];
							$height = $slider_img['sizes'][ 'height' ];

							?>

							<div style="background-image: url('<?php echo $slider_img['sizes']['fhd-image']; ?>')">
							</div>

							<?php
						endwhile;


					// no rows found
					//!!!!!!  echo a defult image for slider !!!!!!!!!
						// echo "You have no slider image!!!";
						

					endif;

				else:
					?>
					<div>
						<img src="<?php echo get_template_directory_uri() ?>/images/default_slider/default_slider.jpg"/>
					</div>
					<?php
				endif;

				?>
			</div>
		</section>

		<!-- title and content section- -->
		<section class="main-section s-line">
			<?php
			if(have_posts()): 
				$front_page_title = get_field( "front_page_title" );
				$front_page_content = get_field( "front_page_content" );
				if ( $front_page_title && $front_page_content ) :
					?>

					<h2><?php echo $front_page_title; ?></h2>
					<p><?php echo $front_page_content; ?></p>
					
					<?php  
				else:
			//!!!!!  output a default title and content for user !!!!
					?>
					<h2>Angkor Harvest</h2>
					<p>Angkor Harvest represents world class third party certified organic food, health and beauty products from Cambodia. Angkor Harvest, based in Burnaby, BC Canada supplies its own branded, bulk and private label organic products. The company has introduced to the North American market, an emerging ‘open trade policy’ of a Cambodian range of exceptional, unique and high quality certified organic food, health and beauty products, some new to North America.</p>

					<?php
				endif;
			endif;
			
			?>
			<div class="featured-icons">
				<?php
				if(have_posts()): 
					if( have_rows('featured_icon') ):
			 	// loop through the rows of data
						while ( have_rows('featured_icon') ) : the_row();
			        // vars
							$featured_icon_image = get_sub_field('featured_icon_image'); 
							?>

							<img src="<?php echo $featured_icon_image['url']; ?>" alt="<?php echo $featured_icon_image['alt']; ?>" />

							<?php
						endwhile;

					else :

				// no rows found
				//!!!!!!  echo a default image for slider !!!!!!!!!
						// echo "You have no featured icon!!!";

					endif;
				endif;
				?>
			</div>
			<button><a href="<?php echo get_permalink( get_page_by_title( 'about' ) ); ?>">More About Us</a></button>

		</section>

		<!-- the linking images -->
		<section class="main-links">
			<?php
			if(have_posts()): 
				$link_to_products = get_field( "link_to_products" );
				$link_to_contact = get_field( "link_to_contact" );
				$link_to_sta = get_field( "link_to_sta" );
				?>

				<div class="link-product">
					<h1>Our Organic Products</h1>
					<?php  
					if ( $link_to_products ): 
						?>
						<img src="<?php echo $link_to_products['sizes']['fhd-image']; ?>" alt="<?php echo $link_to_products['alt']; ?>" />
						<button><a href="<?php echo get_post_type_archive_link( 'product' ) ?>">Explore</a></button>

						<?php  
					else:
				//!!!!!!  echo a default image for slider !!!!!!!!!
					endif;
				endif;
				?>
			</div>

			<div class="link-contact" onclick="location.href='<?php echo get_permalink( get_page_by_title( 'contact' ) ); ?>'">
				
				<?php  
				if(have_posts()): 
					if ( $link_to_contact ): 
						?>
						<div class="link-image" style="background-image: url('<?php echo $link_to_contact['sizes']['large-image']; ?>')"></div>
						<?php  
					else:
				//!!!!!!  echo a default image for slider !!!!!!!!!
					endif;
				endif;
				?>
				<h1>Contact Us</h1>
			</div>

			<div class="link-sta" onclick="location.href='<?php echo get_permalink( get_page_by_title( 'Spark Through Arts' ) ); ?>'">
				<?php  
				if(have_posts()): 
					if ( $link_to_contact ): 
						?>
						<div class="link-image" style="background-image: url('<?php echo $link_to_sta['sizes']['large-image']; ?>')"></div>
						<?php  

					else:
				//!!!!!!  echo a default image for slider !!!!!!!!!
					endif;
				endif;
				?>
				<h1>Sparks Through Arts Foundation</h1>
			</div>
		</section>




		<!-- // blog section- -->
		<section class="main-blogs s-line">
			<div class="blogs-container">
				<?php  
				if(have_posts()): 
					$arg = array( 
						'posts_per_page' => 3,
						'orderby' => 'date', 
						'order' => 'DESC',

					);
					$featured_posts = new WP_Query( $arg );

					if ( $featured_posts->have_posts() ) {
						while( $featured_posts->have_posts() ):
							$featured_posts->the_post();
							if ( have_posts() ) :
								?>

								<div class="main-blog">

									<?php 
									if(has_post_thumbnail()):

										?>

										<div class="img-div" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')" onclick="location.href='<?php echo get_permalink(); ?>'"></div>

										<?php

									else:

										?>

										<div class="img-div" style="background-image: url('<?php echo get_template_directory_uri() ?>/images/default_image/default_blog.png')" onclick="location.href='<?php echo get_permalink(); ?>'"></div>

										<?php

									endif;
									?>
									<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>

									<?php
									
									the_excerpt();
									echo "<h4>".get_the_date()."</h4>";
									?>
								</div>
								<?php
							endif;
						endwhile;
						wp_reset_postdata(); 
					}
				endif;
				?>
			</div>

			<button><a href="<?php echo get_permalink( get_page_by_title( 'News' ) ); ?>">Go To Blogs</a></button>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
?>
