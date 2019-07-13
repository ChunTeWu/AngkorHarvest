
<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mindset
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" <?php post_class('site-main page-blog'); ?>>
		<?php 
		$page_for_posts = get_option( 'page_for_posts' );
		$terms = get_the_category(); 
		foreach($terms as $term) {
			$the_term_name = $term->name;
		}
		?>
		<section class="top-section" style="background-image: url('<?php echo get_the_post_thumbnail_url($page_for_posts); ?>')">


			<h1><?php echo $the_term_name; ?></h1>

		</section>
		<div class="blogs-wrapper s-line">
			<div class="blogs">

				<?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 
		?>
	</div>
	<div class="blog-nav">
		<h2>Category</h2>
		<div class="blog-cate">
			<?php  
			$cates = get_categories();

			foreach($cates as $cate) {
				?>

				<a href="<?php echo get_category_link($cate); ?>" class="blog-category"><?php echo $cate->name; ?></a>
				<?php 
			}

			?>
		</div>
		<?php echo the_posts_navigation(); ?>
		
	</div>
	<div class="mobile-older-post">
		<?php the_posts_navigation(); ?>
	</div>
</div>


</main>

</div><!-- #primary -->

<?php get_footer(); ?>
