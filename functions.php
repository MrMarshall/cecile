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

//Remove 'Project type:' prefix from title
function jeroen_is_gek( $title ) {
	return preg_replace( '#^[\w\d\s]+:\s*#', '', strip_tags( $title ) );
}

add_filter( 'get_the_archive_title', 'jeroen_is_gek' );

//Load languages in child theme
function wpdocs_child_theme_setup() {
    load_child_theme_textdomain( 'shapely', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'wpdocs_child_theme_setup' );

//Date and author information in single archive page
function shapely_posted_on_no_cat() {
        $home_url = get_home_url();
        $author_url = "$home_url/biografie";
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf( $time_string,
                                esc_attr( get_the_date( 'c' ) ),
                                esc_html( get_the_date() ),
                                esc_attr( get_the_modified_date( 'c' ) ),
                                esc_html( get_the_modified_date() )
        ); ?>

        <ul class="post-meta">
        <li><span class="posted-on"><?php echo $time_string; ?></span></li>
        <li><span>door <a href="<?php echo $author_url; ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php esc_html( the_author() ); ?></a></span>
        </li>
        </ul><?php
}
?>
