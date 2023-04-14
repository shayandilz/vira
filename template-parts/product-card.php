<div class="bg-white py-2 d-flex flex-column col-lg-3">
    <a href="<?php the_permalink(); ?>">
        <?php
        $product_img = get_field('archive_img')['url'];
        $product_pdf = get_field('product_pdf_download')['url'];
        $default_img = home_url() . '/wp-content/uploads/2022/09/item2-1-400x400-1.png';

        ?>
        <img src="<?= $product_img ? $product_img : $default_img; ?>" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h6 class="card-title text-dark"><?php the_title(); ?></h6>
        </div>
    </a>
    <div class="d-inline-flex justify-content-center align-items-center gap-1 px-2">
        <a class="btn link-red px-5 py-2 rounded-1" href="#">
            دریافت مشاوره رایگان
        </a>
        <a href="<?= $product_pdf; ?>"
           class="btn link-red rounded-1 d-inline-flex align-items-center justify-content-center">
            <i class="bi bi-filetype-pdf fs-4 d-flex"></i>
        </a>
    </div>
</div>