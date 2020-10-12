<?php get_header(); ?>

<div class="section__content">
    <div class="section__container main">
        <div class="content-archive__content">
            <!-- content starts -->
            <?php
            if ( have_posts() ) {

                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content', 'archive' );
                }

            } else {

                get_template_part( 'template-parts/content/content', 'none' );

            }
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( '<', 'textdomain' ),
                'next_text' => __( '>', 'textdomain' ),
                'class' => 'pagination__container'
            ) ); 
            ?>
            
            <!-- content -->
        </div>
          
        <div><?php get_sidebar(); ?></div>
    </div>
</div>

<?php get_footer(); ?>
