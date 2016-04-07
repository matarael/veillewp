<form method="get" action="<?php bloginfo('url'); ?>">
	<!-- Ici on affiche le champ « s »
	mais nous aurions pu également en faire 
	un champ de type hidden avec une valeur vide-->
	<p>
		<label for="s">Rechercher</label>
		<input type="text" name="s" value="<?php the_search_query(); ?>" id="s">
	</p>
    
    <p>
        <label for="s">categories</label>
        <select name="category_name" multiple="multiple">
            <option value="all">tout</option>
            <?php
                // generate list of categories
                $categories = get_categories();
                foreach ($categories as $category) {
                    //echo '<label for="s"><input type="checkbox" value="' , $category->slug, ' " id="s"/>', $category->name, '</label>';
                    
                    echo '<option value="', $category->slug, '">', $category->name, "</option>\n";
                }
                ?>
        </select>
    </p>
    
    <p>
        <label for="s">categories</label>
        <ul>
            <?php wp_list_categories( array(
                'orderby' => 'name',
                'depth' => 1,
                'child_of' => 33
            ) ); ?> 
        </ul>
    </p>
	<button type="submit">Rechercher</button>
</form>

