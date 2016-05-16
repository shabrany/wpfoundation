<?php get_header(); ?>

<div class="row">

    <div class="medium-8 column">
        <?php if (have_posts()): ?>

            <?php while (have_posts()): the_post(); ?>
                <article class="post">
                    <h2><?php the_title(); ?></h2>
                    <?php the_excerpt(); ?>
                </article>

            <?php endwhile; ?>

        <?php endif; ?>
    </div>
    <div class="medium-4 column">
        <?php dynamic_sidebar('primary-sidebar'); ?>
    </div>
</div>

<?php get_footer(); ?>
