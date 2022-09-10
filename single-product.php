<?php /* Template Name: Product */
get_header(); ?>

<section class="position-relative min-vh-50 d-flex justify-content-center align-items-center">
    <img
        class="position-absolute w-100 h-100 start-0 top-0 object-fit"
        src="<?php echo get_the_post_thumbnail_url() ?>"
        alt="<?php the_title(); ?>">
    <div class="container z-top">
        <div class="row justify-content-start align-items-center text-white">
            <div class="col-8 text-start">
                <?php the_breadcrumb(); ?>
                <h1 class="fs-3 fw-bold">
                    <?php the_title(); ?>
                </h1>
                <div class="d-inline-flex gap-3 small">
                    <div>
                        برند:
                        <?php the_field('brand') ?>
                    </div>
                    <div class="border-start ps-3">
                        دسته:
                        <?php
                        $terms = get_the_terms( $post->ID, 'product_categories' );
                        if ( $terms && ! is_wp_error( $terms ) ) {
                            foreach ( $terms as $term ) {
                                echo $term->name;
                            }
                        }
                        ?>
                    </div>
                    <div class="border-start ps-3">
                        شناسه:
                        <?php the_field('product_id') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container py-5">
    <div class="row justify-content-around">
        <div class="col-6 fs-2 fw-bold text-dark-bg text-start">
            <?php the_title(); ?>
        </div>
        <div class="col-6 text-end">
            <a class="btn link-red px-5 py-2" href="#">
                دریافت مشاوره رایگان
            </a>
        </div>
        <div class="col-12 my-4 fs-6 text-justify">
            <?php the_content(); ?>
        </div>
    </div>
</section>


<?php
get_footer();
