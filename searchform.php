<form  role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">

    
    <?php

        $terms = get_terms( array(
            'taxonomy' => 'category',
            'hide_empty' => true,
            'hierarchical' => true,
        ) );
        
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                echo '<select multiple name="cat" id="example-getting-started">';
                    foreach ( $terms as $term ) {
                        $cats_str = get_category_parents($term->term_id, false, '%#%');     //cherche les categories parentes en les séparants par %#%
                        $cats_array = explode('%#%', $cats_str);                            //éclate l'obet autour des %#%
                        $cat_depth = sizeof($cats_array)-2;                                 //Compte le nombre de morceau, ce qui correspond au nombre de parents et donne la profondeur dans la hiérarchie                        
                        if($cat_depth == 1) {
                            echo '<option value="' . $term->name . '">' . $term->name . '</option>' ;
                        }
                    }
                
                echo '</select>';
            }
    ?> 
    
	<button type="submit">Rechercher</button>
    
</form>