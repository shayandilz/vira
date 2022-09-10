<section class="d-flex"
         style="background-image: url('<?php the_field('why_image2'); ?>'); background-repeat: no-repeat;background-size: cover">
    <div class="container">
        <div class="row">
            <div class="col-4 bg-white d-flex flex-column py-5 px-5">
                    <span class="text-red pb-3 pt-5">
                        <?php the_field('why_small_title2') ?>
                    </span>
                <h4 class="text-dark-bg pb-5">
                    <?php the_field('why_title2') ?>
                </h4>
                <div class="pb-5 text-justify">
                    <?php the_field('why_text2') ?>
                </div>
                <?php
                wp_reset_postdata();

                if (have_rows('why_list2')):
                    while (have_rows('why_list2')): the_row(); ?>
                        <div class="d-flex gap-3 flex-column justify-content-center align-items-start pb-5">
                            <div class="d-inline-flex align-items-center gap-3 justify-content-center">
                                <?php the_sub_field('icon'); ?>
                                <h6 class="text-red">
                                    <?php the_sub_field('title'); ?>
                                </h6>
                            </div>
                            <div class="text-justify">
                                <?php the_sub_field('text'); ?>
                            </div>
                        </div>
                    <?php endwhile;
                    ?>
                <?php endif; ?>
            </div>
            <div class="col-8 d-flex justify-content-center align-items-center row">
                <div class="col-10 d-flex justify-content-center align-items-center">
                    <div class="custom-frame2 p-5 d-flex flex-column justify-content-center align-items-start text-start">
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