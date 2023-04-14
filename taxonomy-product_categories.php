<?php
get_header();
/* Template Name: Taxonomy Product */
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
                    <?php single_term_title(); ?>
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="position-relative min-vh-100 container-fluid d-flex justify-content-center align-items-start mt-5">
    <div class="row w-100 justify-content-center align-items-center pb-3">
        <div class="col-12">
            <div class="row g-3 bg-light-gray">
                <?php
                $term_id = get_queried_object_id();
                $products_query = new WP_Query(array(
                    'post_type' => 'product',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_categories',
                            'field' => 'id',
                            'terms' => $term_id
                        )
                    )
                ));
                if ($products_query->have_posts()) {
                    while ($products_query->have_posts()) {
                        $products_query->the_post();
                        get_template_part('template-parts/product-card');
                    }
                    wp_reset_postdata();
                } else {
                    // If no products are found, display a message
                    echo '<p>No products found for this category.</p>';
                }
                ?>

            </div>
        </div>
    </div>
</section>


<?php get_footer();