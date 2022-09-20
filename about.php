<?php /* Template Name: About */
get_header(); ?>
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
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid mt-5 px-lg-5">
        <div class="row py-5 align-items-center justify-content-center">
            <div class="col-lg-5 col-12 row">
                <?php $about_photo_section = get_field('about_photo_section');
                $photo_1 = $about_photo_section['photo_1'];
                $photo_2 = $about_photo_section['photo_2'];
                $photo_3 = $about_photo_section['photo_3'];
                $photo_4 = $about_photo_section['photo_4'];
                ?>
                <div class="col-6 d-flex gap-4 flex-column translate-min">
                    <div class="ratio-1x1 ratio">
                        <img class="object-fit rounded-1" src="<?= $photo_1['url'] ?>" alt="<?= $photo_1['alt'] ?>">
                    </div>
                    <div class="ratio-1x1 ratio">
                        <img class="object-fit rounded-1" src="<?= $photo_2['url'] ?>" alt="<?= $photo_2['alt'] ?>">
                    </div>
                </div>
                <div class="col-6 d-flex gap-4 flex-column">
                    <div class="ratio-1x1 ratio">
                        <img class="object-fit rounded-1" src="<?= $photo_3['url'] ?>" alt="<?= $photo_3['alt'] ?>">
                    </div>
                    <div class="ratio-1x1 ratio">
                        <img class="object-fit rounded-1" src="<?= $photo_4['url'] ?>" alt="<?= $photo_4['alt'] ?>">
                    </div>
                </div>

            </div>
            <div class="col-lg-7 col-12">
                <span class="text-red pb-2">
                    <?php the_field('small_title_intro') ?>
                </span>
                <h4 class="text-dark-bg pb-4">
                    <?php the_field('title_intro') ?>
                </h4>
                <div class="pb-2 text-justify">
                    <?php the_field('text_intro') ?>
                </div>
                <a class="btn link-red px-5 py-2 rounded-1" href="#">
                    دریافت مشاوره رایگان
                </a>
            </div>
        </div>
    </section>
    <section class="bg-light-gray py-5 p-lg-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-12">
                <span class="text-red pb-2">
                    <?php the_field('small_title_who') ?>
                </span>
                    <h4 class="text-dark-bg pb-4">
                        <?php the_field('title_who') ?>
                    </h4>
                    <div class="pb-2 text-justify">
                        <?php the_field('text_who') ?>
                    </div>
                </div>
                <div class="col-lg-6 col-12">

                </div>
            </div>
            <div class="row">
                <?php
                if (have_rows('item_who')):
                    while (have_rows('item_who')): the_row();
                        $image_front = get_sub_field('photo'); ?>
                        <div class="col-lg-3 col-6">
                            <div class="card rounded-1 overflow-hidden">
                                <div class="position-relative">
                                    <img src="<?= $image_front['url'] ?>" class="card-img-top"
                                         alt="<?= $image_front['alt'] ?>">
                                    <div class="position-absolute bottom-0 start-0 ms-3">
                                    <span class="bg-red text-white px-2">
                                        <?php the_sub_field('date'); ?>
                                    </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fs-6"><?php the_sub_field('title'); ?></h5>
                                    <p class="card-text small"><?php the_sub_field('text'); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <section class="container-fluid my-5 px-lg-5">
        <div class="row align-items-center justify-content-between">
            <div class="col-6">
                <span class="text-red pb-2">
                    <?php the_field('small_title_us') ?>
                </span>
                <h4 class="text-dark-bg pb-4">
                    <?php the_field('title_us') ?>
                </h4>
            </div>
            <?php
            $button_us = get_field('button_us');
            ?>
            <div class="col-6 text-end">
                <a class="btn link-red px-5 py-2 rounded-1" href="<?= $button_us['url']; ?>">
                    <?= $button_us['title']; ?>
                </a>
            </div>
        </div>
        <div class="row align-items-center justify-content-center g-3">
            <?php
            if (have_rows('team_about')):
                while (have_rows('team_about')): the_row();
                    $image_front = get_sub_field('photo'); ?>
                    <div class="position-relative col-lg-3 col-6 box-about">
                        <div class="bg-dark-bg rounded-1 overflow-hidden">
                            <img class="img-fluid lazy w-100"
                                 src="<?= $image_front['url'] ?>"
                                 alt="<?= $image_front['alt'] ?>">
                        </div>
                        <div class="position-absolute top-0 end-0 text-center w-100 h-100 d-flex align-items-center flex-column justify-content-center text-white lazy">
                            <h6>
                                <?php the_sub_field('job'); ?>
                            </h6>
                            <p>
                                <?php the_sub_field('name'); ?>
                            </p>
                        </div>
                    </div>
                <?php endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
    </section>
<!-- TABS -->
    <section class="pt-5">
        <ul class="nav nav-tabs custom-tab row border-0 w-100 align-items-center mb-4 px-0 mx-0" id="myTab" role="tablist">
            <?php
            $rows1 = get_field('more_about');
            if ($rows1):
                foreach ($rows1 as $key => $title) {
                    $tab_title = $title['tab_title']; ?>
                    <li class="nav-item col d-flex justify-content-center px-0" role="presentation">
                        <button class="z-top text-white nav-link py-3 px-lg-4 px-md-3 lazy rounded-0
                        <?php if ($key == 0) {
                            echo 'show active';
                        } ?> position-relative"
                                id="cat-<?= $key; ?>-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#cat-<?= $key; ?>"
                                type="button" role="tab"
                                aria-controls="cat-<?= $key; ?>"
                                aria-selected="true">
                            <?= $tab_title; ?>

                        </button>
                    </li>
                <?php }
            endif;
            wp_reset_postdata(); ?>
        </ul>
        <div class="tab-content container pb-5 pt-2" id="myTabContent" role="tablist">
            <?php
            $rows = get_field('more_about');
            if ($rows):
                foreach ($rows as $key => $row) {
                    $text = $row['text']; ?>
                    <div class="tab-pane fade <?php if ($key == 0) {
                        echo 'show active';
                    } ?>" id="cat-<?php echo $key; ?>" role="tabpanel"
                         aria-labelledby="cat-<?= $key ?>-tab">
                        <div class="text-center">
                            <?= $text; ?>
                        </div>
                    </div>
                <?php };
            endif;
            wp_reset_postdata(); ?>
        </div>
        <div class="row py-4 px-5 g-3">
            <?php
            $services = get_field('service_list');
            if ($services): ?>
                <?php foreach ($services as $post):
                    setup_postdata($post); ?>
                    <div class="col-4">
                        <div class="bg-white shadow-lg p-5">
                            <div class="pb-4">
                                <?php $image_service = get_field('service_icon'); ?>
                                <img src="<?= $image_service['url']; ?>" alt="<?= $image_service['alt']; ?>">
                            </div>
                            <h6>
                                <?php the_title(); ?>
                            </h6>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </section>

<?php
get_footer();
