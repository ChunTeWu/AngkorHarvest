<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AngkorHarvest
 */

?>

<?php  

if (is_single()) {
	$theBlogClass = 'single-blog s-line';
}else{
	$theBlogClass = 'multi-blog';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($theBlogClass); ?>>

	<div class="blog-image">
		<?php 
		$link = get_permalink();
		if (is_single()):
			the_post_thumbnail('fhd-image');  
		else:
			?>
			<a href="<?php echo $link; ?>"><?php the_post_thumbnail('gallery-first-square');  ?></a>
			<?php
		endif;

		?>
	</div>

	<div class="blog-text">
		<div class="blog-title-date">
			<a href="<?php echo $link; ?>">
				<?php the_title('<h2>', '</h2>'); ?>
			</a>
			<h4><?php echo get_the_date(); ?></h4>

		</div>

		<?php 

		if (is_single()) {
			the_content();
		}else{
			the_excerpt();
		}
		?>

	</div>
	

</article><!-- #post-<?php the_ID(); ?> -->
