<section class="hero-slider position-relative">
    <!-- Slider main container -->
    <div class="swiper1 h-100 position-relative">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <?php
            if (have_rows('banner_slider')):
                while (have_rows('banner_slider')): the_row();
                    $image_brand = get_sub_field('image') ?>
                    <div title="<?php the_sub_field('title'); ?>"
                         class="swiper-slide d-flex align-items-center flex-column justify-content-center"
                         style="background-image: url('<?= $image_brand ?>'); background-repeat: no-repeat;background-size: cover">
                        <div class="container">
                            <div class="row justify-content-center align-items-center text-center py-lg-0 py-5">
                                <div class="col-lg-8 col-10">
                                        <span class="text-red">
                                            <?php the_sub_field('small_title'); ?>
                                        </span>
                                    <h1 class="text-white fs-1">
                                        <?php the_sub_field('title'); ?>
                                    </h1>
                                    <div class="text-semi-light">
                                        <?php the_sub_field('text'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                ?>
            <?php endif; ?>
        </div>
        <!-- If we need navigation buttons -->
        <div class="swiper-prev position-absolute top-50 end-0 fs-4 text-white z-top">
            <i class="bi bi-chevron-left"></i>
        </div>
        <div class="swiper-next position-absolute top-50 start-0 fs-4 text-white z-top">
            <i class="bi bi-chevron-right"></i>
        </div>
    </div>
    <div class="container hero-bottom-slider z-top">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 col-12 d-md-flex d-block">
                <?php
                $i = 0;
                if (have_rows('slider_box')):
                    while (have_rows('slider_box')) : the_row();
                        $i++;
                        $photo = get_sub_field('photo');
                        $icon = get_sub_field('icon');
                        $small_title = get_sub_field('small_title');
                        $title = get_sub_field('title');
                        $button = get_sub_field('button'); ?>
                        <div class="box1 position-relative p-4" data-aos="flip-left" data-aos-delay="<?= $i; ?>00">
                            <img title="<?= $title; ?>"
                                 class="position-absolute w-100 h-100 top-0 end-0 object-fit z-below lazy"
                                 src="<?= $photo['url'] ?>" alt="<?= $photo['alt'] ?>">
                            <div class="d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="z-top py-4">
                                    <?= $icon ?>
                                </div>
                                <span class="text-text-gray z-top pb-2">
                                <?= $small_title ?>
                            </span>
                                <h4 class="z-top fs-6 lh-base">
                                    <?= $title ?>
                                </h4>
                                <a class="btn my-4 rounded-3 link-trans" href="<?= $button['url'] ?>">
                                    <?= $button['title'] ?>
                                </a>
                            </div>
                        </div>
                    <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>