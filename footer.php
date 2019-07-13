<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AngkorHarvest
 */

?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<ul>
				<li><a href="<?php echo get_permalink( get_page_by_path( 'faq' ) ); ?>">FAQ</a></li>
				<li><a href="<?php echo get_permalink( get_page_by_path( 'privacy' ) ); ?>">Privacy Policy</a></li>
				<li><a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>">Contact Us</a></li>
				<!-- <li><span>&copy;Angkor Harvest</span></li> -->
			</ul>
			<span>&copy;Angkor Harvest</span>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
