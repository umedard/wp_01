<?php get_header(); ?>

<div class="section__content">
    <div class="section__container main">
        <div class="content-page__content">
            <!-- content starts -->
            <?php
            if ( have_posts() ) {

                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content', 'page' );
                }

            } else {

                get_template_part( 'template-parts/content/content', 'none' );

            }
            ?>
            <!-- content -->
        </div>

        <div><?php get_sidebar(); ?></div>
    </div>
</div>

<?php get_footer(); ?>
