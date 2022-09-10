<section class="vh-100 position-relative">
    <!-- Slider main container -->
    <div class="swiper1 h-100">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <?php
            if (have_rows('banner_slider')):
                while (have_rows('banner_slider')): the_row();
                    $image_brand = get_sub_field('image') ?>
                    <div class="swiper-slide d-flex align-items-center flex-column justify-content-center"
                         style="background-image: url('<?= $image_brand ?>'); background-repeat: no-repeat;background-size: cover">
                        <div class="container">
                            <div class="row justify-content-center align-items-center text-center">
                                <div class="col-8">
                                        <span class="text-red">
                                            <?php the_sub_field('small_title'); ?>
                                        </span>
                                    <h1 class="text-white">
                                        <?php the_sub_field('title'); ?>
                                    </h1>
                                    <div class="text-semi-light">
                                        <?php the_sub_field('text'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                ?>
            <?php endif; ?>
        </div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <div class="container position-absolute end-0 start-0 translate-middle-y z-top">
        <div class="row justify-content-center align-items-center">
            <div class="col-8 d-flex">
                <?php $box1 = get_field('first_box');

                $button = $box1['button'] ?>
                <div class="box1 position-relative p-4">
                    <img class="position-absolute w-100 h-100 top-0 end-0 object-fit z-below lazy"
                         src="<?= $box1['photo']['url'] ?>" alt="<?= $box1['photo']['alt'] ?>">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="z-top py-4">
                            <?= $box1['icon'] ?>
                        </div>
                        <span class="text-text-gray z-top pb-2">
                                <?= $box1['small_title'] ?>
                            </span>
                        <h4 class="z-top fs-6 lh-base">
                            <?= $box1['title'] ?>
                        </h4>
                        <a class="btn my-4 rounded-3 link-trans" href="<?= $button['url'] ?>">
                            <?= $button['title'] ?>
                        </a>
                    </div>
                </div>
                <?php $box2 = get_field('second_box');

                $button1 = $box2['button'] ?>
                <div class="box1 position-relative p-4">
                    <img class="position-absolute w-100 h-100 top-0 end-0 object-fit z-below lazy"
                         src="<?= $box2['photo']['url'] ?>" alt="<?= $box2['photo']['alt'] ?>">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="z-top py-4">
                            <?= $box2['icon'] ?>
                        </div>
                        <span class="text-text-gray z-top pb-2">
                                <?= $box2['small_title'] ?>
                            </span>
                        <h4 class="z-top fs-6 lh-base">
                            <?= $box2['title'] ?>
                        </h4>
                        <a class="btn my-4 rounded-3 link-trans" href="<?= $button1['url'] ?>">
                            <?= $button1['title'] ?>
                        </a>
                    </div>
                </div>
                <?php $box3 = get_field('third_box');

                $button2 = $box3['button'] ?>
                <div class="box1 position-relative p-4">
                    <img class="position-absolute w-100 h-100 top-0 end-0 object-fit z-below lazy"
                         src="<?= $box3['photo']['url'] ?>" alt="<?= $box3['photo']['alt'] ?>">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="z-top  py-4">
                            <?= $box3['icon'] ?>
                        </div>
                        <span class="text-text-gray z-top pb-2">
                                <?= $box3['small_title'] ?>
                            </span>
                        <h4 class="fs-6 z-top lh-base">
                            <?= $box3['title'] ?>
                        </h4>
                        <a class="btn my-4 rounded-3 link-trans" href="<?= $button2['url'] ?>">
                            <?= $button2['title'] ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>