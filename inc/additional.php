
function angkorharvest_excerpt_length( $length ) {
return 25;
}

add_filter( 'excerpt_length', 'angkorharvest_excerpt_length', 999 );

function angkorharvest_excerpt_more( $more ) {
return '<a class="read-more" href="' . get_permalink() . '">&#60;&#47; Know more about the student&#62;</a>';
}
add_filter( 'excerpt_more', 'angkorharvest_excerpt_more' );