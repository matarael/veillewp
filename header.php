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
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <?php wp_head(); ?>
    </head>
    
    <body <?php body_class(); ?>>
        <nav>
            <div id="logo">
                <img src="Veillewp/wp-content/themes/veilleWP/assets/img/WAX_LOGO.png"/>
            </div>
            <div id="menu">
                <ul>
                    <li>
                        <a href="http://localhost/veilleWP/" >tout</a>
                    </li>
                    <?php
                        $categories = get_categories();
                        $separator = ' ';
                        $output = '';

                        foreach( $categories as $category ) {
                            $output .= '<li>'.'<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>'.'</li>' . $separator;
                        }
                        echo trim( $output, $separator );
                    ?>
                </ul>
            </div>
        </nav>