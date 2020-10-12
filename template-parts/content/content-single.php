
<?php

                if(get_field('image')) {
                   
                    echo ' <div class="content-single__img" style="background-image: url(' . get_field('image') . '); " ></div>
';
                    
                }
                
                ?>
                
                <div class="content-single">
            <div>
                
                <h1 class="content-single__title"><?php the_title()?></h1>

             
                <div class="content-single__postinfo">
                    <span class="content-archive__icon_author">by <?php the_author_link();  ?></span>
                    <span class="content-archive__icon_date"><?php the_date() ?></span>
                </div>

                <article class="content-single__contentwrapper"><?php the_content() ?></article>
                <div class="content-single__categories">
                    <?php 
                    
                    function show_categories() {
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                        }
                    }
                    
                    function show_tags()
                    {
                        $post_tags = get_the_tags();
                        $separator = ' , ';
                        if (!empty($post_tags)) {
                            foreach ($post_tags as $tag) {
                                $output .= '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>' . $separator;
                            }
                            echo 'Tagged' . trim($output, $separator);
                        }
                    }
                    ?>

                    <span>Posted in </span> <?php show_categories(); ?>
                    <?php 
                    if(get_the_tags()) {
                        echo ' <span class="content-single__separator"> &#8226; </span>';
                    }
                   ?>
                    <span></span> <?php show_tags(); ?>
                   
                </div>
            </div>
   
</div>
