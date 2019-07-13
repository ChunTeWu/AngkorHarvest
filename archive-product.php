<?php
/**
 *	Archive - Products to display the Product Category Taxonomy Terms
 *    
 */

get_header(); ?>

<div id="primary" class="content-area">


    <?php
    if ( have_posts() ) :
        get_template_part( 'template-parts/content', 'allProducts' );

    else :

        get_template_part( 'template-parts/content', 'none' );

    endif; 
    ?>


</div><!-- #primary -->

<?php get_footer(); ?>