<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Digify website">
    <meta name="description" content="">
    <meta name="author" content="EJ">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >


<section class="bg-dark-bg topbar w-100 position-fixed lazy">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-between">
            <div class="col-6 d-flex gap-2">
                <div class="text-white link-hover">
                    Fa
                </div>
                <a href="#" class="border-start text-white text-decoration-none ps-3 link-hover lazy">
                    سامانه ارتباط با مشتریان
                    <i class="bi bi-chevron-left"></i>
                </a>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <ul class="list-group list-group-horizontal gap-3  list-unstyled">
                    <li>
                        <?php get_template_part( 'template-parts/social-svg/instagram' ); ?>
                    </li>
                    <li>
                        <?php get_template_part( 'template-parts/social-svg/instagram' ); ?>
                    </li>
                    <li>
                        <?php get_template_part( 'template-parts/social-svg/instagram' ); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<header id="main-header" class="w-100 position-fixed lazy border-bottom">
    <div class="flex-nowrap bg-white position-relative">
        <nav class="container navbar navbar-expand-xl rounded navbar-light lazy-slow justify-content-xl-between justify-content-xl-start animate__animated animate__fadeInDown animate__delay-1s">
            <button class="navbar-toggler border-0 px-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 4.5H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M11.5303 9.5H21.0003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M3 14.5H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M11.5303 19.5H21.0003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </button>
            <a class="navbar-brand me-0 me-lg-3" href="<?php echo esc_url(get_home_url()) ?>">
                <?php
                $logo = get_field('site_logo', 'option');
                ?>
                <img class="lazy" height="30" src="<?= $logo ?>" alt="<?= get_bloginfo('name'); ?>">
            </a>
            <div class="collapse navbar-collapse justify-content-end mt-4 mt-lg-0" id="navbarNav">
                <div class="d-flex align-items-center gap-2">
                    <?php get_template_part( 'template-parts/contact-svg/phone' ); ?>
                    <div class="d-flex flex-column">
                        <span>
                            تماس
                        </span>
                        <span>
                            099934
                        </span>
                    </div>
                </div>
                <div class="d-block d-lg-none">
                    <?php
                    wp_nav_menu(array(
                            'theme_location' => 'headerMenuLocation',
                            'menu_class' => 'navbar-nav pe-0',
                            'container' => false,
                            'menu_id' => 'navbarTogglerMenu',
                            'item_class' => 'nav-item',
                            'link_class' => 'nav-link text-white',
                            'depth' => 2,
                    ));
                    ?>
                </div>
            </div>
        </nav>
        <nav class="position-absolute end-0 bottom-0 d-none d-lg-block" style="transform: translateY(50%)">
            <div class="bg-red custom-header">
                <?php
                wp_nav_menu(array(
                        'theme_location' => 'headerMenuLocation',
                        'menu_class' => 'navbar-nav gap-4 flex-row p-2',
                        'container' => false,
                        'menu_id' => 'navbarTogglerMenu',
                        'item_class' => 'nav-item',
                        'link_class' => 'nav-link text-white',
                        'depth' => 2,
                ));
                ?>
            </div>
        </nav>
    </div>
</header>

<main>




