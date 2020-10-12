<?php get_header(); ?>

<div class="section__content">
    <div class="section__container main">
        <div class="content-single__content">
            <!-- content starts -->
            <?php
            if ( have_posts() ) {

                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content', 'single' );
                     
                }

            } else {

                get_template_part( 'template-parts/content/content', 'none' );

            }
            ?>
            <!-- content -->
            <div class="content-single pagination__wrapper">
                    <?php 

               
                    if($link = get_next_post_link()) {
                        next_post_link( '<div><p> PREV</p>%link</div>' );
                    }
                    if($link = get_previous_post_link()) {
                        previous_post_link( '<div><p> NEXT</p>%link</div>' );
                    }
                    ?>
            </div>
        </div>
                  
        <div><?php get_sidebar(); ?></div>
    </div>
</div>

<?php get_footer(); ?>
