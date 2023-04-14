<section class="min-vh-50 d-lg-flex py-5 align-items-center position-relative"
         style="background-image: url('<?php the_field('category_back_image') ?>');background-size: cover;background-repeat: no-repeat">
    <div class="container">
        <div class="row align-items-start justify-content-center text-center">
            <div class="col-lg-6 col-12 mt-5">
                <h5 class="fs-3 fw-bold text-dark-bg" data-aos="fade-up" data-aos-delay="100">
                    <?php the_field('category_title'); ?>
                </h5>
                <p data-aos="fade-up" data-aos-delay="300">
                    <?php the_field('category_text'); ?>
                </p>
            </div>
        </div>
    </div>
    <div class="container translate-middle-y-custom z-top">
        <div class="row justify-content-center align-items-center g-3">
            <?php
            $args = array(
                'taxonomy' => 'product_categories',
                'orderby' => 'name',
                'order' => 'ASC'
            );

            $cats = get_categories($args);
            $i = 0;

            foreach ($cats as $cat) { $i++; ?>
                <div class="col-lg col-6" data-aos="zoom-in" data-aos-delay="<?= $i; ?>00">
                    <div class="bg-white p-2 shadow-lg d-flex flex-column align-items-center justify-content-center text-center rounded-1 ">
                        <div class="z-top py-4">
                            <?php the_field('product_category_icon', 'product_categories' . '_' . $cat->term_id) ?>
                        </div>
                        <h4 class="z-top fs-6 lh-base">
                            <?php echo $cat->name; ?>
                        </h4>
                        <span class="text-text-gray z-top pb-2">
                                <?php echo $cat->description; ?>
                            </span>
                        <a class="rounded-circle border text-decoration-none"
                           href="<?php echo get_category_link($cat->term_id) ?>">
                            <i class="bi bi-arrow-left-short d-flex"></i>
                        </a>
                    </div>
                </div>
            <?php }
            wp_reset_postdata()
            ?>
        </div>
    </div>
</section>