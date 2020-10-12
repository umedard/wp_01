<article class="content-archive">
            <div class="content-archive__text">
                <div><span class="content-archive__icon_date"><?php the_date() ?></span><span class="content-archive__icon_category">
                    <?php 
                        $category = get_the_category();
                        if ( $category[0] ) {
                            echo '<a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a>';
                        }
                    ?>
                
                </span></div>
                <div class="content-archive__title"><h2><?php echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>' ?></h2></div>
                <div><span class="content-archive__icon_author">by <?php the_author_link();  ?></span></div>
                <div><?php the_excerpt() ?></div>
                <div class="content-archive__more"><a href="<?php echo get_permalink() ?>">Read More </a></div>
               
            </div>
       

                <?php 
                $imageUrl = '';
                if(get_field('image')) {
                    $imageUrl = get_field('image');
                } else {
                    $imageUrl = bloginfo('template_url')  . '/dist/images/coffee.jpg';
                }
                ?>
                <a href="<?php echo get_permalink() ?>" class="content-archive__img_wrapper">
                     <div class="content-archive__img" style="background-image: url('<?php echo $imageUrl ?>'); " ></div>
            </a>



      
            </article>

