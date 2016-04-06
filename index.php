
<?php get_header(); ?>

    <div class="grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <div class="grid-item">
                <?php the_post_thumbnail(); ?>
                <div></div>
                <section>
                    <a href="<?php the_permalink() ?>">
                        <h1>
                            <?php the_title(); ?>
                        </h1>
                    </a>
                    <p class= "auteur"><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></p>
                    <?php the_excerpt() ?>
                    <section>
              </div>
        <?php endwhile; endif; ?>
        
<?php wp_footer(); ?>
<?php wp_pagenavi(); ?>
<?php get_footer(); ?>