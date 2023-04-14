<section class="min-vh-100 d-flex align-items-center position-relative">
    <div class="position-absolute top-0 start-0 z-below">
        <?php get_template_part('template-parts/effect-svg/vector1'); ?>
    </div>
    <div class="container py-5 py-lg-0 px-lg-5 z-top">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-6 col-12 pt-lg-0 pt-3">
                    <span class="text-red line-before position-relative" data-aos="zoom-in-right" data-aos-delay="100">
                        <?php the_field('about_small_title') ?>
                    </span>
                <h4 class="text-dark-bg pb-4" data-aos="fade-up" data-aos-delay="300">
                    <?php the_field('about_title') ?>
                </h4>
                <p class="pb-5 text-justify" data-aos="fade-up" data-aos-delay="400">
                    <?php the_field('about_text') ?>
                </p>
                <div class="row pb-5 g-4">
                    <?php
                    if (have_rows('about_feature_list')):
                        $i = 0;
                        while (have_rows('about_feature_list')): the_row(); $i++; ?>
                            <div class="col-6 d-inline-flex text-start text-red">
                                <div data-aos="zoom-in" data-aos-delay="<?= $i; ?>00">
                                    <?php the_sub_field('icon'); ?>
                                </div>
                                <span data-aos="fade-left" data-aos-delay="<?= $i; ?>00" class="ms-3">
                                        <?php the_sub_field('title'); ?>
                                    </span>
                            </div>
                        <?php endwhile;
                        ?>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </div>
                <div class="bg-red d-flex justify-content-between align-items-center rounded-1 p-5 w-100" data-aos="flip-up" data-aos-delay="300">
                    <?php
                    if (have_rows('about_statistic')):
                        while (have_rows('about_statistic')): the_row(); ?>
                            <div class="d-flex gap-3 flex-column justify-content-center align-items-center">
                                <h6 class="text-white">
                                    <?php the_sub_field('title'); ?>
                                </h6>
                                <p class="text-semi-light opacity-75">
                                    <?php the_sub_field('small_title'); ?>
                                </p>
                            </div>
                        <?php endwhile;
                        ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 col-12 d-flex align-items-center justify-content-lg-end justify-content-center pb-5 pb-lg-0 row mt-5 mt-lg-0 position-relative">
                <div class="col-lg-7 col-12 position-relative">
                    <?php $about_image = get_field('about_image'); ?>
                    <div class="ratio ratio-1x1 custom-frame z-top" data-aos="zoom-in" data-aos-delay="300" style="height: 450px;">
                        <img class="object-fit" src="<?= $about_image['url'] ?>" alt="<?= $about_image['alt'] ?>">
                    </div>
                    <div class="position-absolute z-below" data-aos="flip-up" data-aos-delay="300" style="bottom: -40px;right: -40px">
                        <?php get_template_part('template-parts/effect-svg/dots'); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="position-absolute w-auto end-0 bottom-0 mt-3" data-aos="flip-left" data-aos-delay="200">
        <?php get_template_part('template-parts/effect-svg/vector2'); ?>
    </div>
</section>