
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

   <?php
        if ( have_posts() ) :
            get_template_part( 'template-parts/content', 'productTaxonomy' );



        else :

            get_template_part( 'template-parts/content', 'none' );

            endif; ?>

</div><!-- #primary -->

<?php get_footer(); ?>
