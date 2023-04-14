<?php
get_header();
/* Template Name: Product Archive */
?>
    <section class="position-relative min-vh-50 d-flex justify-content-center align-items-center">
        <img class="position-absolute w-100 h-100 start-0 top-0 object-fit"
             src="<?php echo get_field('product_archive', 'option')['url'] ?>"
             alt="<?php the_title(); ?>">
        <div class="container z-top">
            <div class="row justify-content-start align-items-center text-white">
                <div class="col-8 text-start">
                    <?php get_template_part('template-parts/product-breadcrumb'); ?>
                    <h1 class="fs-3 fw-bold">
                        <?php the_title(); ?>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative min-vh-100 container-fluid d-flex justify-content-center align-items-start mt-5">
        <div class="row w-100 justify-content-center align-items-center pb-3">
            <div class="col-12">
                <ul class="nav nav-tabs flex-nowrap overflow-tab justify-content-center align-items-center p-2 gap-2 bg-light-gray"
                    id="myTab" role="tablist">
                    <?php
                    $i = 0;
                    $taxonomy = 'product_categories';
                    $orderby = 'name';
                    $show_count = 0;      // 1 for yes, 0 for no
                    $pad_counts = 0;      // 1 for yes, 0 for no
                    $hierarchical = 1;      // 1 for yes, 0 for no
                    $title = '';

                    $args = array(
                        'taxonomy' => $taxonomy,
                        'orderby' => $orderby,
                        'show_count' => $show_count,
                        'pad_counts' => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li' => $title,
                        'hide_empty' => 1
                    );
                    $all_categories = get_categories($args);
                    foreach ($all_categories as $cat) {
                        if ($cat->category_parent == 0) {
                            $category_id = $cat->term_id; ?>
                            <li class="nav-item" role="presentation">
                                <button class="category-tab nav-link <?php if ($i == 0) {
                                    $i = 1;
                                    echo 'active';
                                }
                                ?>" id="cat-<?= $category_id; ?>-tab" data-bs-toggle="tab"
                                        data-bs-target="#cat-<?= $category_id; ?>" type="button" role="tab"
                                        aria-controls="cat-<?= $category_id; ?>"
                                        aria-selected="true">
                                    <?= $cat->name; ?>
                                </button>
                            </li>

                        <?php }
                    }
                    ?>
                </ul>
                <div class="tab-content bg-light-gray p-2" id="myTabContent">
                    <?php
                    foreach ($all_categories as $key => $cats) {
                        $category_id = $cats->term_id;
                        ?>
                        <div class="tab-pane fade <?php if ($key == 0) {
                            echo 'show active';
                        }
                        ?>" id="cat-<?= $category_id; ?>" role="tabpanel"
                             aria-labelledby="cat-<?= $category_id; ?>-tab">
                            <?php

                            $args = array(
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'ignore_sticky_posts' => 1,
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_categories',
                                        'field' => 'term_id',
                                        'terms' => $category_id,
                                        'operator' => 'IN'
                                    )
                                )
                            );
                            $loop = new WP_Query($args);
                            if ($loop->have_posts()) { ?>
                            <div class="row g-3">
                                <?php while ($loop->have_posts()) : $loop->the_post();
                                    get_template_part('template-parts/product-card');
                                endwhile;
                                } ?>
                            </div>
                            <?php wp_reset_postdata();

                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>


<?php get_footer();
