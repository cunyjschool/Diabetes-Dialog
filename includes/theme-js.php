<?php
if (!is_admin()) add_action( 'wp_print_scripts', 'woothemes_add_javascript' );
function woothemes_add_javascript( ) {    
    wp_enqueue_script( 'jquery');
    if (is_front_page() || is_home()) {
        wp_enqueue_script( 'stepcarousel', get_bloginfo('template_directory').'/includes/js/stepcarousel.js', array( 'jquery' ) );
        wp_enqueue_script( 'stepcarousel-setup', get_bloginfo('template_directory').'/includes/js/stepcarousel-setup.js', array( 'jquery' ) );
    }
    wp_enqueue_script( 'scripts', get_bloginfo('template_directory').'/includes/js/scripts.js', array( 'jquery' ) );
}
?>