</main>

<footer class="bg-gray py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4 col-12">
                <a href="<?php echo esc_url(get_home_url()) ?>">
                    <?php
                    $footer_logo = get_field('footer_logo', 'option');
                    ?>
                    <img class="lazy" src="<?= $footer_logo ?>" alt="<?= get_bloginfo('name'); ?>">
                </a>
                <div class="pt-5 text-justify small fw-lighter text-semi-light">
                    <?php the_field('footer_text', 'option'); ?>
                </div>
            </div>
            <div class="col-lg-5 col-12 ">
                <h6 class="fw-bold pb-3 text-white">
                    آخرین اخبار ویرا
                </h6>
                <div class="d-flex flex-column gap-4">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => '2',
                        'ignore_sticky_posts' => true
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) : $i = 0;
                        /* Start the Loop */
                        while ($loop->have_posts()) :
                            $loop->the_post(); ?>
                            <div class="hstack gap-4">
                                <div class="ratio ratio-1x1">
                                    <img src="<?php echo get_the_post_thumbnail_url() ?>"
                                         class="rounded-1 object-fit lazy"
                                         alt="<?php the_title(); ?>">
                                </div>
                                <div class="d-flex flex-column align-items-start gap-3">
                                    <?php
                                    $category_detail = get_the_category($post->ID);//$post->ID
                                    foreach ($category_detail as $category) { ?>
                                        <a href="<?= get_category_link($category->term_id) ?>"
                                           class="text-decoration-none py-2 px-3 bg-text-gray rounded-1 fs-6 fw-lighter text-white">
                                            <?php echo $category->name ?>
                                        </a>
                                    <?php } ?>
                                    <div class="text-semi-light text-justify small">
                                        <?php
                                        $excerpt = get_the_excerpt();
                                        $excerpt = substr($excerpt, 0, 240);
                                        $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
                                        $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));

                                        echo $excerpt . '...';
                                        ?>
                                    </div>
                                    <div class="text-semi-light small">
                                        <?php echo get_the_date('d  F , Y'); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    endif;
                    wp_reset_postdata(); ?>
                </div>

            </div>
            <div class="col-lg col-12">
                <h6 class="fw-bold pb-3 text-white">
                    لینک های مهم
                </h6>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footerLocationOne',
                    'menu_class' => 'list-unstyled pe-0 small fw-lighter text-semi-light d-flex flex-column gap-3',
                    'container' => false,
                    'item_class' => 'nav-item',
                    'link_class' => 'text-semi-light lazy text-decoration-none',
                    'depth' => 1,
                ));
                ?>
            </div>
        </div>
    </div>
</footer>
<div class="bg-dark-bg position-relative py-3">
    <div class="row position-absolute translate-middle-y top-0 end-0 justify-content-between w-100">
        <div class="col-6">
            <button id="myBtn" class="btn bg-red text-white rounded-3 w-auto ms-5 border-0">
                رفتن به بالا
            </button>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <ul class="list-group list-group-horizontal gap-3 list-unstyled bg-red text-white custom-header w-50 align-items-center px-4">
                <?php
                if (have_rows('social_list', 'option')):
                    while (have_rows('social_list', 'option')) : the_row();
                        $title = get_sub_field('title');
                        $icon = get_sub_field('icon');
                        $url = get_sub_field('link'); ?>
                        <li>
                            <a class="text-white" href="<?php echo esc_url($url); ?>">
                                <i title="<?= $title; ?>" class="<?php echo $icon; ?>"></i>
                            </a>
                        </li>
                    <?php endwhile;
                endif;
                ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid px-5">
        <div class="row pt-4 align-content-between justify-content-center flex-lg-row flex-column-reverse">
            <div class="col-lg-6 col-12 text-center text-lg-start">
                <span class="small">
                    © 2020 طراحی شده توسط یوسف و شایان
                </span>
            </div>
            <div class="col-lg-6 col-12">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footerLocationTwo',
                    'menu_class' => 'list-unstyled text-center text-lg-start pe-0 small fw-lighter text-white d-flex flex-row gap-3 justify-content-lg-end justify-content-center',
                    'container' => false,
                    'item_class' => 'nav-item',
                    'link_class' => 'text-semi-light lazy text-decoration-none',
                    'depth' => 1,
                ));
                ?>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
