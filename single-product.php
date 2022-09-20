<?php /* Template Name: Product */
get_header(); ?>

    <section class="position-relative min-vh-50 d-flex justify-content-center align-items-center">
        <img class="position-absolute w-100 h-100 start-0 top-0 object-fit"
             src="<?php echo get_the_post_thumbnail_url() ?>"
             alt="<?php the_title(); ?>">
        <div class="container z-top">
            <div class="row justify-content-start align-items-center text-white">
                <div class="col-lg-8 col-12 text-start">
                    <?php the_breadcrumb(); ?>
                    <h1 class="fs-3 fw-bold">
                        <?php the_title(); ?>
                    </h1>
                    <div class="d-flex d-lg-inline-flex flex-column flex-lg-row gap-3 small">
                        <div>
                            برند:
                            <?php the_field('brand') ?>
                        </div>
                        <div class="border-start ps-3">
                            دسته:
                            <?php
                            $terms = get_the_terms($post->ID, 'product_categories');
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    echo $term->name;
                                }
                            }
                            ?>
                        </div>
                        <div class="border-start ps-3">
                            شناسه:
                            <?php the_field('product_id') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container py-5">
        <div class="row justify-content-around g-4">
            <div class="col-lg-6 col-12 fs-2 fw-bold text-dark-bg text-lg-start text-center">
                <?php the_title(); ?>
            </div>
            <div class="col-lg-6 col-12 text-center text-lg-end">
                <a class="btn link-red px-5 py-2 rounded-1" href="#">
                    دریافت مشاوره رایگان
                </a>
                <a href="<?php echo get_field('product_pdf_download')['url']; ?>"
                   class="btn link-red rounded-1 d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-filetype-pdf fs-4 d-flex"></i>
                </a>
            </div>
            <div class="col-12 my-4 fs-6 text-justify">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <section class="container py-5">
        <div class="row justify-content-center g-4">
            <?php
            if (have_rows('features')):
                while (have_rows('features')): the_row(); ?>
                    <div class="col-lg-4 col-6 position-relative box">
                        <?php $front_box = get_sub_field('show_content'); ?>
                        <div class="d-flex w-100 flex-column justify-content-center align-items-center text-center gap-2 rounded-1 p-5">
                            <div class="front-box position-relative lazy">
                                <img width="60px" class="text-center pt-4 pb-2 lazy" src="<?= $front_box['icon'] ?>"
                                     alt="<?= $front_box['title'] ?>">
                                <h6 class="text-white py-3">
                                    <?= $front_box['title'] ?>
                                </h6>
                                <p class="py-3 text-semi-light fw-light">
                                    <?= $front_box['text'] ?>
                                </p>
                            </div>
                            <div class="back-box position-absolute top-50 translate-middle-y lazy px-4 z-top">
                                <p class="py-3 fw-light">
                                    <?php the_sub_field('hide_content') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
    </section>
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 justify-content-center">
                <ul class="nav nav-tabs border-bottom justify-content-center justify-content-lg-start mb-4 gap-2" id="myTab"
                    role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link py-md-4 px-lg-4 px-md-3 p-2 lazy position-relative active"
                                id="cat-desc-tab"
                                data-bs-toggle="tab" data-bs-target="#cat-desc" type="button" role="tab"
                                aria-controls="cat-desc" aria-selected="true">
                            توضیحات
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link py-md-4 px-lg-4 px-md-3 p-2 lazy" id="cat-gal-tab"
                                data-bs-toggle="tab" data-bs-target="#cat-gal" type="button" role="tab"
                                aria-controls="cat-gal" aria-selected="true">
                            گالری
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link py-md-4 px-lg-4 px-md-3 p-2 lazy" id="cat-tech-tab"
                                data-bs-toggle="tab" data-bs-target="#cat-tech" type="button" role="tab"
                                aria-controls="cat-tech" aria-selected="true">
                            مشخصات فنی
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent" role="tablist">
                    <div class="tab-pane fade active show" id="cat-desc" role="tabpanel"
                         aria-labelledby="cat-desc-tab">
                        <?php get_template_part('template-parts/single-product/tab-content'); ?>
                    </div>
                    <div class="tab-pane fade" id="cat-gal" role="tabpanel"
                         aria-labelledby="cat-gal-tab">
                        <?php get_template_part('template-parts/single-product/tab-gallery'); ?>
                    </div>
                    <div class="tab-pane fade" id="cat-tech" role="tabpanel"
                         aria-labelledby="cat-tech-tab">
                        <?php get_template_part('template-parts/single-product/tab-tech'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
get_footer();
