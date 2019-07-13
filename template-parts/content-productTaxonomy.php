<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AngkorHarvest
 */

?>


<main id="main" <?php post_class('site-main page-productTaxonomy'); ?>>

	<?php 
            //retrieve the id of the queried taxonomy term for later use
	$term_id = get_queried_object()->term_id; 
	$term_image = get_field('product_category_term_image', $taxonomy_name . '_' . $term_id);
	?>

	<section class="top-section" style="background-image: url('<?php echo $term_image['url']; ?>')">
		<h1><?php echo single_term_title();?></h1>
	</section>

	<section class="product-list">

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
			<p><?php echo $the_taxonomy; ?></p>

		</div>

		<?php
//List of products assigned into the queried taxonomy term 
		$arg = array( 
			'post_type' => 'product',
			'posts_per_page' => -1,
			'tax_query' => array(
				array (
					'taxonomy' => 'product-category',
					'field' => 'ID',
					'terms' => $term_id
				)
			),
		);
		$productlist = new WP_Query( $arg );

		if ( $productlist->have_posts() ) :
			while( $productlist->have_posts() ):
				$productlist->the_post();
				$productLink = get_permalink();
				$productImage = the_field( "product_category_term_image" );
				?>

				<div class="product-wrapper">
					<a href="<?php echo $productLink; ?>"><?php the_post_thumbnail('medium-square');?></a>
					<?php the_title('<a href="'.$productLink.'" class="product-name">', '</a>'); ?>
				</div>

				<?php

			endwhile;
			wp_reset_postdata(); 
		endif;

		?>
	</section>

	
	<?php
	if (get_field( "category_title" , $taxonomy_name . '_' . $term_id)) {
		$category_title = get_field( "category_title" , $taxonomy_name . '_' . $term_id);
	}  

	if (get_field( "category_image" , $taxonomy_name . '_' . $term_id)) {
		$category_image = get_field( "category_image" , $taxonomy_name . '_' . $term_id);
	}  

	if ($category_title || $category_image) :
		?>
		<section class="product-heading">
			<h2><?php echo $category_title; ?></h2>
			<img src="<?php echo $category_image['url'] ?>" alt="">
		</section>
		<?php
	endif;
	?>

	<section class="product-about s-line">
		<?php  
		if( have_rows('more_about_category', $taxonomy_name . '_' . $term_id) ):
            // echo "12312312";
			while ( have_rows('more_about_category', $taxonomy_name . '_' . $term_id) ) : the_row();
				$more_about_image = get_sub_field('more_about_image');
				$more_about_title = get_sub_field('more_about_title');
				$more_about_content = get_sub_field('more_about_content');
				?>

				<div class="product-about-content left-right-wrapper">
					<div class="left-right-content">
						<div class="img-part">
							<img src="<?php echo $more_about_image['url']; ?>" alt="">
						</div>
						<div class="product-text text-part">
							<h2><?php echo $more_about_title; ?></h2>
							<p><?php echo $more_about_content; ?></p>
						</div>
					</div>
				</div>

				<?php

			endwhile;

		endif;


		?>


	</section>


	<?php
       //retrieve the Category Info field value
	the_field('category_info', $taxonomy_name . '_' . $term_id);
	?>
	
</main><!-- #main -->

