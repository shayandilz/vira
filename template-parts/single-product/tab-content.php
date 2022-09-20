<div class="row">
    <div class="col-lg-8 col-12">
        <?php $product_desc = get_field('product_desc'); ?>
        <div class="text-dark text-justify">
            <?= $product_desc['text'] ?>
        </div>
        <div class="d-flex flex-column justify-content-start overflow-hidden">
            <?php
            if (have_rows('bar_progress')):
                while (have_rows('bar_progress')): the_row();
                    ?>
                    <h6>
                        <?php the_sub_field('title') ?>
                    </h6>
                    <div class="meter position-relative">
                        <span class="position-absolute top-0 d-block h-100"
                              style="width:<?php the_sub_field('num') ?>%;">
                            <span class="progress d-block h-100"></span>
                        </span>
                    </div>
                <?php endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="ratio-1x1 ratio">
            <img class="img-fluid" src="<?= $product_desc['product_side_image']['url'] ?>"
                 alt="<?= $product_desc['product_side_image']['alt'] ?>">
        </div>
        <?php $hotspot = get_field('hotspot_image') ?>
        <div class="ratio-1x1 ratio">
            <img class="img-fluid" src="<?= $hotspot['url'] ?>"
                 alt="<?= $hotspot['alt'] ?>">
            <div>
                <?php
                if (have_rows('hotspot_list')):
                    while (have_rows('hotspot_list')): the_row();
                        $hotspot = get_sub_field('hotspot');
                        $firstVal = strtok($hotspot, ",");
                        $second_token = strtok(' ');
                        ?>
                        <button type="button"
                                style="left: <?= $firstVal; ?>; top: <?= $second_token; ?>;height: 30px;
                                        width: 30px;"
                                class="text-white fw-bolder d-flex justify-content-center align-items-center rounded-circle bg-red border-0 shadow-none position-absolute"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                data-bs-title="<?php the_sub_field('text') ?>">
                            <i class="bi bi-plus-lg d-flex"></i>
                        </button>
                    <?php endwhile;
                endif;
                wp_reset_postdata(); ?>
            </div>
        </div>

    </div>
</div>