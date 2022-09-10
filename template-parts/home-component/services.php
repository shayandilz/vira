<section class="container-fluid py-5">
    <p class="text-red text-center">
        <?php the_field('service_title'); ?>
    </p>
    <h5 class="fs-3 fw-bold text-dark-bg text-center">
        <?php the_field('service_text'); ?>
    </h5>
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