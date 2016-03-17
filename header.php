<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>La Fournée Dorée</title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <base href="<?php echo home_url(); ?>" target="_self">
        <?php wp_head(); ?>
    </head>
    
    <body <?php body_class(); ?>>
        
        <div id="categories" style= text-align:center;>

			<a href="http://wax.julien-boucry.fr" >tout</a>
			<?php
			$categories = get_categories();
			$separator = ' ';
			$output = '';
			
			foreach( $categories as $category ) {
				$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
			}
			echo trim( $output, $separator );
			
			?>
		</div>