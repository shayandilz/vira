<section class="d-flex align-items-center position-relative">
    <div class="container px-lg-5">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12 d-flex align-items-center justify-content-start pb-5 pb-lg-0">
                <?php $why_image = get_field('why_image'); ?>
                <img class="img-fluid" src="<?= $why_image['url'] ?>" alt="<?= $why_image['alt'] ?>">
            </div>
            <div class="col-lg-6 col-12">
                <span class="text-red position-relative line-before" data-aos="zoom-in-right" data-aos-delay="100">
                    <?php the_field('why_small_title') ?>
                </span>
                <h4 class="text-dark-bg pb-4" data-aos="fade-up" data-aos-delay="300">
                    <?php the_field('why_title') ?>
                </h4>
                <div class="pb-5 text-justify" data-aos="fade-up" data-aos-delay="400">
                    <?php the_field('why_text') ?>
                </div>

                <div class="bg-red p-5 rounded-1" data-aos="flip-up" data-aos-delay="300">
                    <div class="swiper2 overflow-hidden position-relative">
                        <div class="swiper-wrapper">
                            <?php
                            wp_reset_postdata();

                            if (have_rows('why_list')):
                                while (have_rows('why_list')): the_row(); ?>
                                    <div class="swiper-slide">
                                        <div class="d-flex gap-3 flex-column justify-content-center align-items-start">
                                            <h6 class="text-white">
                                                <?php the_sub_field('title'); ?>
                                            </h6>
                                            <div class="text-semi-light opacity-75">
                                                <?php the_sub_field('text'); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                ?>
                            <?php endif; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="position-absolute end-0 bottom-0">-->
<!--        --><?php //get_template_part('template-parts/effect-svg/gear'); ?>
<!--    </div>-->
</section>