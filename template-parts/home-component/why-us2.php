<section class="d-flex"
         style="background-image: url('<?php the_field('why_image2'); ?>'); background-repeat: no-repeat;background-size: cover">
    <div class="container  px-lg-5">
        <div class="row">
            <div class="col-lg-4 col-12 bg-white py-5 overflow-hidden">
                <span class="text-red position-relative line-before" data-aos="zoom-in-right" data-aos-delay="100">
                    <?php the_field('why_small_title2') ?>
                </span>
                <h4 class="text-dark-bg pb-5" data-aos="fade-up" data-aos-delay="300">
                    <?php the_field('why_title2') ?>
                </h4>
                <div class="pb-5 text-justify" data-aos="fade-up" data-aos-delay="400">
                    <?php the_field('why_text2') ?>
                </div>
                <?php
                wp_reset_postdata();

                if (have_rows('why_list2')):
                    $i = 0;
                    while (have_rows('why_list2')): the_row();$i++; ?>
                        <div class="d-flex gap-3 flex-column justify-content-center align-items-start pb-5">
                            <div class="d-inline-flex align-items-center gap-3 justify-content-center">
                                <div data-aos="zoom-in" data-aos-delay="<?= $i; ?>00">
                                    <?php the_sub_field('icon'); ?>
                                </div>
                                <h6 data-aos="fade-left" data-aos-delay="<?= $i; ?>00" class="text-red">
                                    <?php the_sub_field('title'); ?>
                                </h6>
                            </div>
                            <div data-aos="fade-left" data-aos-delay="<?= $i; ?>00" class="text-justify">
                                <?php the_sub_field('text'); ?>
                            </div>
                        </div>
                    <?php endwhile;
                    ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-8 col-12 d-flex justify-content-center align-items-center row p-4 p-lg-0">
                <div class="col-10 d-flex justify-content-center align-items-center">
                    <div class="custom-frame2 p-5 d-flex flex-column justify-content-center align-items-start text-start" data-aos="flip-up" data-aos-delay="300">
                        <div class="text-white">
                            <?php the_field('why_middle_text'); ?>
                        </div>
                        <span class="text-white">
                            <?php the_field('why_subtitle'); ?>
                        </span>
                        <span class="small">
                            <?php the_field('small_sub_title_why'); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>