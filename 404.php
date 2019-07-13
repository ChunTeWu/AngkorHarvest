<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AngkorHarvest
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">

				<div class="page-content">
					<h1>Opps, page not found!</h1>

					<h2>We are sorry, but the link you entered was not available at this moment.</h2>

					<button><a href="<?php echo home_url(); ?>">Back to Home</a></button>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
