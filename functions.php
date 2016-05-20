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
    wp_enqueue_script('bootstrap-multiselect-js', get_template_directory_uri() . '/bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js', 'jquery' );
    //wp_register_script( 'infinite-scroll', get_template_directory_uri().'/assets/js/infinitescroll.min.js', 'jquery', '2.0', true );
	//wp_enqueue_script( 'infinite-scroll' );
}

// Adds main script and style
function enqueue_app(){
	// adds main app stylesheet
	wp_enqueue_style('app-css', get_template_directory_uri() . '/app.css', array() ); // no dependencies since bootstrap is re-compiled inside it via gulp.

	// adds main app js file
	wp_enqueue_script('app-js', get_template_directory_uri() . '/app.js', array('bootstrap-js', 'masonry-js', 'bootstrap-multiselect-js') );
}



add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap' );
add_action( 'wp_enqueue_scripts', 'enqueue_vendors' );
add_action( 'wp_enqueue_scripts', 'enqueue_app' );





function my_function_admin_bar(){
    return true;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

//ajoute les images à la une
function montheme_setup() {
add_theme_support( 'post-thumbnails' );
} 
add_action( 'after_setup_theme', 'montheme_setup' );

// ajoute l'image à la une automatiquement.
function autoset_featured() {
    global $post;
    $already_has_thumb = has_post_thumbnail($post->ID);
        if (!$already_has_thumb)  {
        $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
                    if ($attached_image) {
                        foreach ($attached_image as $attachment_id => $attachment) {
                        set_post_thumbnail($post->ID, $attachment_id);
                        }
                    }
        }
    }  //end function

add_action('the_post', 'autoset_featured');
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');

// Generate custom excerpt length
function wpse_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpse_excerpt_length', 999 );

//custom fields url source
function add_custom_meta_box()
{
    add_meta_box("source_url", "Source URL", "custom_meta_box_source_URL", "post", "side", "high", null);
}
add_action("add_meta_boxes", "add_custom_meta_box");


function save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";

    if(isset($_POST["meta-box-text"]))
    {
        $meta_box_text_value = $_POST["meta-box-text"];
    }   
    update_post_meta($post_id, "meta-box-text", $meta_box_text_value);

    if(isset($_POST["meta-box-dropdown"]))
    {
        $meta_box_dropdown_value = $_POST["meta-box-dropdown"];
    }   
    update_post_meta($post_id, "meta-box-dropdown", $meta_box_dropdown_value);

    if(isset($_POST["meta-box-checkbox"]))
    {
        $meta_box_checkbox_value = $_POST["meta-box-checkbox"];
    }   
    update_post_meta($post_id, "meta-box-checkbox", $meta_box_checkbox_value);
}

add_action("save_post", "save_custom_meta_box", 10, 3);

//
function press_this_ptype($link) {
	$post_type = 'bookmark';
	$link = str_replace('?u=', '&u=', $link);
	return $link;
}
add_filter('shortcut_link', 'press_this_ptype', 11);



//---------------------------------SEARCH---------------------------------//

add_filter( 'query_vars', 'willy_add_query_vars' );
function willy_add_query_vars( $vars ){
	$vars[] = "ville";
	$vars[] = "chambres";
	$vars[] = "quartiers";
	$vars[] = "prix-mini";
	$vars[] = "prix-maxi";
	$vars[] = "equipements";
	return $vars;
}