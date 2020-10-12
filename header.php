<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php the_excerpt(); ?>" />
    <?php wp_head() ?>
</head>
<body id="top" <?php body_class(); ?>>


<?php wp_body_open(); ?>

<div class="menu-mobile">
    <div class="menu-mobile__wrapper">
        <div class="menu-mobile__item"> <i id="closeMenu" class="mobile-menu__close-button fas fa-times"></i>
    
        <?php

        wp_nav_menu( array( 
                'theme_location' => 'topmenu', 
                'container_class' => 'mobile-nav' ) ); 
            ?>

          
    
    
    </div>
    </div>
</div>

<div class="top"> <h1 > <i id="menutriggers" ></i> </h1></div>

<header class="header" >
<div class="section__container">
    <h1 class="header__title"><a  href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
    <h3 class="header__description"><?php bloginfo( 'description' ); ?></h3>
    <div class="header__bar"></div>
    <div id="menutrigger" class="menu-trigger"> <a href="#top">MENU <i  class="fas fa-bars"></i> </a></div>
    <nav class="header__menu">
        <?php
            wp_nav_menu( array( 
                'theme_location' => 'topmenu', 
                'container_class' => 'topmenu' ) ); 
            ?>
    </nav>

   
</div>
 <?php 
if(get_query_var('cat') || get_query_var('tag')) {
    echo '<div class="header__categories"><p>';
    single_term_title(  );
    echo '</p></div>';
}

?>

</header>
