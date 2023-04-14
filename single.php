<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package virasanaat
 */
get_header()
?>

    <section class="position-relative min-vh-50 d-flex justify-content-center align-items-center">
        <img class="position-absolute w-100 h-100 start-0 top-0 object-fit"
             src="<?php echo get_the_post_thumbnail_url() ?>"
             alt="<?php the_title(); ?>">
        <div class="container z-top">
            <div class="row justify-content-start align-items-center text-white">
                <div class="col-8 text-start">
                    <?php the_breadcrumb(); ?>
                    <h1 class="fs-3 fw-bold">
                        <?php the_title(); ?>
                    </h1>
                    <div class="d-inline-flex gap-3 align-items-center">
                        <span class="small"><?php echo get_the_date('M'); ?></span>
                        /
                        <span class="fs-5 small-md-down"><?php echo get_the_date('d'); ?></span>
                    </div>
                    <?php
                    $category_detail = get_the_category(get_the_ID());//$post->ID
                    foreach ($category_detail as $category) { ?>

                        <p class="fw-light text-white-50"><?php echo $category->name ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div id="main-content" class="row g-0">
                <div id="content" class="col-lg-8 pe-lg-4 pb-lg-0 pb-4">

                    <!--                    {{-- editor part--}}-->
                    <article class="editor animate__animated animate__fadeInUp animate__delay-1s mt-5">
                        <p>
                            <?php the_content(); ?>
                        </p>
                    </article>
                    <hr class="wow animate__animated animate__fadeIn">
                    <div class="my-4 wow animate__animated animate__fadeIn">
                        <p class="h2 normal-md-down fs-3">
                            اشتراک گذاری
                        </p>

                        <ul class="nav w-max-content hstack align-items-center">
                            <li class="ms-2">
                                <a href="http://www.facebook.com/share.php?<?= get_permalink() ?>"
                                   class="px-3 link-dark"
                                   target="_blank">
                                    <i class="bi bi-facebook"></i>
                                </a>
                            </li>

                            <li class="ms-2">
                                <a href="whatsapp://send?text=<?= get_permalink() ?>"
                                   class="px-3 link-dark"
                                   target="_blank">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                            </li>

                            <li class="ms-2">
                                <a href="https://telegram.me/share/url?url=<?= get_permalink() ?>"
                                   class="px-3 link-dark"
                                   target="_blank">
                                    <i class="bi bi-telegram lh-sm"></i>
                                </a>
                            </li>
                            <li class="ms-2">
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_permalink(); ?>"
                                   class="px-3 link-dark"
                                   target="_blank">
                                    <i class="bi bi-linkedin lh-sm"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php
                    $prev_post = get_adjacent_post(false, '', true);
                    $next_post = get_adjacent_post(false, '', false);
                    ?>
                    <!--                    {{-- navigation post  --}}-->
                    <div class="my-5 wow animate__animated animate__fadeIn bg-light-gray p-4">
                        <div class="row align-items-start g-md-3 g-4 row-cols-md-2 row-cols-1">
                            <?php if (!empty($next_post)) { ?>
                                <div class="col border-gold border-md-end">
                                    <div class="position-relative">
                                        <p class="fw-bold text-gold text-start">قبلی</p>

                                        <h4 class="m-0 normal-md-down">
                                            <a href="<?php echo get_permalink($next_post->ID); ?>"
                                               class="link-dark">
                                                <?php echo $next_post->post_title ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            <?php }
                            if (!empty($prev_post)) { ?>
                                <div class="col">
                                    <div class="position-relative">
                                        <p class="fw-bold text-gold text-md-end">بعدی</p>

                                        <h4 class="m-0 normal-md-down">
                                            <a href="<?php echo get_permalink($prev_post->ID); ?>"
                                               class="link-dark">
                                                <?php echo $prev_post->post_title; ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>

                <div id="sidebar" class="col-lg-4">
                    <div class="sidebar__inner">
                        <!--{{-- categories --}}-->
                        <div class="mb-4">
                            <div class="vstack gap-3">
                                <?php get_template_part('template-parts/tags'); ?>
                            </div>
                        </div>


                        <!--                        {{-- socials --}}-->
                        <div class="mb-4">
                            <p class="h2 normal-md-down fs-2 mb-4">شبکه های اجتماعی</p>

                            <ul class="nav justify-content-start">
                                <?php
                                if (have_rows('social_list', 'option')):
                                    while (have_rows('social_list', 'option')):
                                        the_row();
                                        ?>
                                        <li class="nav-item d-flex align-items-center">
                                            <a href="<?php the_sub_field('link'); ?>"
                                               class="px-3 link-dark"
                                               target="_blank">
                                                <?php the_sub_field('icon'); ?>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif;
                                wp_reset_postdata();
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php

get_footer()
?>