<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="" content="" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
          integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu"
          crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/stellarnav.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive.css">
    



</head>

<body>
   

    <head>
    <div class="sn-header top">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-transparent">
            <div class="collapse navbar-collapse sn-nav-collapse" id="navbarA1">
                <div class="d-md-none d-flex p-2">
                    <img src="" class="sn-logo" alt="" />
                    <div class="ms-auto text-center py-2">
                        <button type="button" class="navbar-toggler sn-toggler-btn" data-bs-toggle="collapse"
                            data-bs-target="#navbarA1" aria-controls="navbarA1" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <ul class="navbar-nav sn-navbar-nav ms-auto mt-2 pr-2 mt-lg-0">
                    <!-- Existing navigation links -->

                    <!-- New navigation links -->
                    <li id="menu-item-659"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-659 nav-item">
                        <a href="#" class="nav-link"><i class="fas fa-map-marker-alt"></i> 128 City Road, London, EC1V 2NX</a>
                    </li>
                    <li id="menu-item-659"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-659 nav-item">
                        <a href="#" class="nav-link"><i class="fab fa-telegram-plane"></i> info@gmail.com</a>
                    </li>
                </ul>
                <!-- Social Media Icons -->
                <ul class="navbar-nav sn-navbar-nav ms-auto mt-2 mt-lg-0 social-media-links">
                    <li class="nav-item">
                        <a href="https://www.facebook.com/" target="_blank" class="nav-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://twitter.com/" target="_blank" class="nav-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.instagram.com/" target="_blank" class="nav-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.linkedin.com/" target="_blank" class="nav-link">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

    <div class="sn-header navigation-bar stick bg-transparent">
        <div class="container mx-auto px-4">
            <nav class="flex items-center justify-between py-4">
                <a class="logo" href="<?php echo home_url(); ?>" title="logo">
                    <img src="<?php echo get_field('logo', 'options')['url']; ?>" alt="Logo" class="h-10">
                </a>
                <div class="menu mr-4">
                    <?php
                    wp_nav_menu(array('theme_location' => 'menu-1', 'container_class' => 'stellarnav'));
                    ?>
                </div>
                <div class="search-bar">
                  <form action="<?php echo home_url();?>" method="get">
                    <input type="text" name="s" placeholder="Search..." class="form-control">
                    <button type="submit" class="btn"><i class="fas fa-search" aria-hidden="true"></i></button>
                  </form>
                </div>
            </nav>
        </div>
    </div>

</head>
