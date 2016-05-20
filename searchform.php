<form  role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">

    
    <?php

    //list des catégories
        $terms = get_terms( array(
            'taxonomy' => 'category',
            //'hide_empty' => true,
            //'hierarchical' => true,
        ) );
        
        echo '<label>Catégories</label>';
        echo '<br>';
        
        echo '<select multiple name="cat[]" class="multiselect selectorCategory">';
            foreach ( $terms as $term ) {
                    echo '<option value="' . $term->slug . '">' . $term->name . '</option>' ;
            }

        echo '</select>';
        
        
    //Authors list function
        //Gets an array of the available authors
        function op_all_authors() {
            global $wpdb;
            $order = 'user_nicename';
            $user_ids = $wpdb->get_col("SELECT ID FROM $wpdb->users ORDER BY $order");

            foreach($user_ids as $user_id) :
                $user = get_userdata($user_id);
                $all_authors[$user_id] = $user->display_name;
            endforeach;
            return $all_authors;
        }
        
        echo '<br>';
    
    //Author name
        $authors = op_all_authors();
        echo '<label>Auteurs</label>';
        echo '<br>';
        echo '<select multiple name="author[]" class="multiselect selectorAuthor">';
            foreach ( $authors as $author ) {
                    echo '<option value="' . $author . '">' . $author . '</option>' ;
            }

        echo '</select>';
    
        
            
    ?> 
    <br>
	<button class='search' type="submit">Rechercher</button>
    
</form>