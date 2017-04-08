<?php
function my_theme_enqueue_styles() {

    $parent_style = 'shapely'; //set parent

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'shapely-child',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
?>

<?php

/*
*Remove 'Project type: ' from title
*/
 
function jeroen_is_gek( $title ) {
	// Remove any HTML, words, digits, and spaces before the title.
	return preg_replace( '#^[\w\d\s]+:\s*#', '', strip_tags( $title ) );
}

add_filter( 'get_the_archive_title', 'jeroen_is_gek' );

?>
