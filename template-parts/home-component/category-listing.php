<section class="vh-65 d-flex align-items-center position-relative"
         style="background-image: url('<?php the_field('category_back_image') ?>');background-size: cover;background-repeat: no-repeat">
    <div class="container">
        <div class="row align-items-start justify-content-center text-center">
            <div class="col-6 mb-5">
                <h5 class="fs-3 fw-bold text-dark-bg">
                    <?php the_field('category_title'); ?>
                </h5>
                <p>
                    <?php the_field('category_text'); ?>
                </p>
            </div>
        </div>
    </div>
    <div class="container position-absolute bottom-0 start-0 translate-middle-y-custom end-0 z-top">
        <div class="row justify-content-center align-items-center g-3">
            <?php
            $args = array(
                'taxonomy' => 'product_categories',
                'orderby' => 'name',
                'order' => 'ASC'
            );

            $cats = get_categories($args);

            foreach ($cats as $cat) { ?>
                <div class="col">
                    <div class="bg-white shadow-lg d-flex flex-column align-items-center justify-content-center text-center rounded-1 ">
                        <div class="z-top py-4">
                            <?php the_field('product_category_icon', 'product_categories' . '_' . $cat->term_id) ?>
                        </div>
                        <h4 class="z-top fs-6 lh-base">
                            <?php echo $cat->name; ?>
                        </h4>
                        <span class="text-text-gray z-top pb-2">
                                <?php echo $cat->description; ?>
                            </span>
                        <a class="rounded-circle border" href="<?php echo get_category_link($cat->term_id) ?>">
                            <i class="bi bi-arrow-left-short"></i>
                        </a>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>