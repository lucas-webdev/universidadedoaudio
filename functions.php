<?php 
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' ); 

function enqueue_parent_styles() { 
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' ); 
}
function modify_read_more_link() {
  return '<a class="read_more" href="' . get_permalink() . '">Leia mais</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );
?>