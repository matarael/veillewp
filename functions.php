<?php
// Required Scripts for the theme

// Add Bootstrap
function enqueue_bootstrap() {
	// Add boostrap css. Useless since it is compiled with the custom css
	// wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/bower_components/bootstrap/dist/css/bootstrap.min.css' );

	// Add boostrap JS and jQuery lib -- those are still necessary.
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', 'jquery' );
}

// Adds other vendors  & libs
function enqueue_vendors() {
    wp_enqueue_script('masonry-js', get_template_directory_uri() . '/bower_components/masonry/dist/masonry.pkgd.min.js', 'jquery' );
}

// Adds main script and style files
function enqueue_app(){
	// adds main app stylesheet
	wp_enqueue_style('app-css', get_template_directory_uri() . '/app.css', array() ); // no dependencies since bootstrap is re-compiled inside it via gulp.

	// adds main app js file
	wp_enqueue_script('app-js', get_template_directory_uri() . '/app.js', array('bootstrap-js', 'masonry-js') );
}



add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap' );
add_action( 'wp_enqueue_scripts', 'enqueue_vendors' );
add_action( 'wp_enqueue_scripts', 'enqueue_app' );


function my_function_admin_bar(){
    return true;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');