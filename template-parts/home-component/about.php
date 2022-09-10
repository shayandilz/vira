<section class="vh-100 d-flex align-items-center">
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-6">
                    <span class="text-red pb-2">
                        <?php the_field('about_small_title') ?>
                    </span>
                <h4 class="text-dark-bg pb-4">
                    <?php the_field('about_title') ?>
                </h4>
                <p class="pb-5 text-justify">
                    <?php the_field('about_text') ?>
                </p>
                <div class="row pb-5 g-4">
                    <?php
                    if (have_rows('about_feature_list')):
                        while (have_rows('about_feature_list')): the_row(); ?>
                            <div class="col-6 d-inline-flex text-start text-red">
                                <?php the_sub_field('icon'); ?>
                                <span class="ms-3">
                                        <?php the_sub_field('title'); ?>
                                    </span>
                            </div>
                        <?php endwhile;
                        ?>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </div>
                <div class="bg-red d-flex justify-content-between align-items-center rounded-1 p-5 w-100">
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
            <div class="col-6 d-flex align-items-center justify-content-end row">
                <div class="col-7">
                    <?php $about_image = get_field('about_image'); ?>
                    <div class="ratio ratio-1x1 custom-frame" style="height: 450px;">
                        <img class="object-fit" src="<?= $about_image['url'] ?>" alt="<?= $about_image['alt'] ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>