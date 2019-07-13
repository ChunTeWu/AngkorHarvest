<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AngkorHarvest
 */

?>

<main id="main" <?php post_class('site-main page-allProducts'); ?>>
	<!-- about -->
	<section class="top-section" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/default_image/default.jpg">
		<h1>Products</h1>
	</section>

	<section class="categories s-line">
		<h2>Categories</h2>
		<!-- DISPLAY THE PRODUCT CATEGORY TAXONOMY TERMS WITH THEIR IMAGE -->
		<div class="cate-wrapper">
			<?php 
			$taxonomy_name = 'product-category';

			$productterms = get_terms($taxonomy_name); 
            //var_dump($productterms);
			if ( $productterms && ! is_wp_error($productterms) ){
				foreach ( $productterms as $term ) {
					$termimage=get_field('product_category_term_image', $taxonomy_name . '_' . $term->term_id);

                    //variables to show the image with choosen size
					$url = $termimage['url'];
					$alt = $termimage['alt'];

					$size = 'medium-square';
					$myimage = $termimage['sizes'][ $size ];
					$width = $termimage['sizes'][ $size . '-width' ];
					$height = $termimage['sizes'][ $size . '-height' ];

					?>
					<div class="cate-single-wrapper">
						<a href="<?php echo get_term_link($term); ?>" class="cate-image"><img src="<?php echo $myimage; ?>" alt=""></a>
						<a href="<?php echo get_term_link($term); ?>" class="cate-name"><?php echo $term->name; ?></a>
					</div>

					<?php 
				}
				wp_reset_postdata();
			}

			?>
		</div>

	</section>        
</main><!-- #main -->

