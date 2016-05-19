
<?php get_header(); ?>
    
        <div class="grid">
            
        <?php
            $args = array(
                'category_name'      => $_GET['cat']
            );
            
            

            // The Query
            $query = new WP_Query( $args );


            if (isset ($args['category_name']))
            // The Loop
                while ( $query->have_posts() ) {
                    $query->the_post(); ?>
                    <div class="grid-item">
                        <?php if( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail(); ?>
                            <!--<div></div>-->
                            <div class="arrow-up"></div>
                        <?php } ?>

                        <section>
                            <a href="<?php the_permalink() ?>">
                                <h1>
                                    <?php the_title(); ?>
                                </h1>
                            </a>
                            <p> <?php the_category() ?> </p>
                            <!--<p class= "auteur"><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></p>-->
                            <?php the_excerpt() ?>
                        </section>
                    </div>
                    
                    
                    <?php
                }
            wp_reset_postdata()
        ?>


        
        <?php if (have_posts() && !isset ($args['category_name']))  : while (have_posts()) : the_post(); ?>
            
            <div class="grid-item">
                <?php if( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail(); ?>
                    <!--<div></div>-->
                    <div class="arrow-up"></div>
                <?php } ?>
                
                <section>
                    <a href="<?php the_permalink() ?>">
                        <h1>
                            <?php the_title(); ?>
                        </h1>
                    </a>
                    <p> <?php the_category() ?> </p>
                    <!--<p class= "auteur"><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></p>-->
                    <?php the_excerpt() ?>
                </section>
            </div>
            
        <?php endwhile; endif; ?>
    </div>
        
    <div class= "footer">
        <img class="loader" src= "<?php echo get_template_directory_uri(); ?>/assets/img/loader.gif" alt=""/>

        <?php wp_footer(); ?>
        <?php wp_pagenavi(); ?>
        <?php get_footer(); ?>
    </div>