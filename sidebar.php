<div class="sidebar">
    <div class="sidebar__box"> 
        <div class="sidebar__title"> recent posts</div>
        <div > 
            <ul class="sidebar__list">
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 5, 
                    'post_status' => 'publish', 
                    'post_type' => 'post'
                ));
                foreach($recent_posts as $post) : ?>
                    <li>
                        <a href="<?php echo get_permalink($post['ID']) ?>">
                            <?php // echo get_the_post_thumbnail($post['ID'], 'full'); ?>
                            
                            <p><?php echo $post['post_title'] ?></p>
                        </a>
                    </li>
                <?php endforeach; wp_reset_query(); ?>
            </ul>
        </div>
    </div>


    <div class="sidebar__box"> 
        <div class="sidebar__title"> archives</div>
        <div > 
            <ul class="sidebar__list">
                <?php 
                    $args = array(
                        'type'            => 'monthly',
                        'limit'           => 7,
                        'format'          => 'html', 
                        'before'          => '',
                        'after'           => '',
                        'show_post_count' => false,
                        'echo'            => 1,
                        'order'           => 'DESC',
                    );
                    wp_get_archives( $args );
                ?>
                </li>

        </div>
    </div>

    <div class="sidebar__box"> 
        <div class="sidebar__title"> categories</div>
        <div > 
            <ul class="sidebar__list">
                <?php wp_list_categories( array(
                    'orderby' => 'name',
                    'title_li'            => __( '' ),
                    'use_desc_for_title'  => 0,
                ) ); ?> 
            </ul>
        </div>
    </div>

    <div class="sidebar__box"> 
        <div class="sidebar__title"> tags</div>
        <div > 
            <ul class="sidebar__list sidebar__tags">
                <?php
                $tags = get_tags();
                if ( $tags ) :
                    foreach ( $tags as $tag ) : ?>
                        <li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>