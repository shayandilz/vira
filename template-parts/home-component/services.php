<section class="container-fluid py-5 position-relative">
    <div class="position-absolute w-auto end-0 top-0 mt-2 z-below">
        <?php get_template_part('template-parts/effect-svg/vector2'); ?>
    </div>
    <p class="text-red text-center">
        <?php the_field('service_title'); ?>
    </p>
    <h5 class="fs-3 fw-bold text-dark-bg text-center">
        <?php the_field('service_text'); ?>
    </h5>
    <div class="row py-4 px-lg-5 g-3">
        <?php
        $services = get_field('service_list');
        if ($services): ?>
            <?php foreach ($services as $post):
                setup_postdata($post); ?>
                <div class="col-lg-4 col-6 z-top">
                    <div class="bg-white shadow-lg p-5 text-lg-start text-center">
                        <div class="pb-4">
                            <?php $image_service = get_field('service_icon'); ?>
                            <img src="<?= $image_service['url']; ?>" alt="<?= $image_service['alt']; ?>">
                        </div>
                        <h6 class="lh-base">
                            <?php the_title(); ?>
                        </h6>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif;
        wp_reset_postdata(); ?>
    </div>
</section>