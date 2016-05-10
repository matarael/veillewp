
<?php get_header(); ?>

    <div class="grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
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
                    <section>
              </div>
        <?php endwhile; endif; ?>
        
<?php wp_footer(); ?>
<?php wp_pagenavi(); ?>
<?php get_footer(); ?>