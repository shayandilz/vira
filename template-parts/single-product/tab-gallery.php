<div class="my-4">
    <div class="swiper3 h-100">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper list-unstyled">
            <?php
            $image_gallery = get_field('product_gallery');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($image_gallery):
                ?>
                <?php foreach ($image_gallery as $image): ?>
                <div class="swiper-slide">
                    <img class="d-block w-100 img-fluid" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
                </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>