<?php
/* Template Name: Blog Archive */
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package amaco
 */

get_header();

?>

    <!--get categories for fun-->
<?php
$categories = get_categories();


?>

    <div class="bg-navblack">
        <div class="container">
            <ul class="nav flex-nowrap flex-lg-wrap text-white px-0 py-3 align-items-center gap-4 top-blog">
                <li class="nav-item">
                    <a class="nav-link active text-white p-0" aria-current="page"
                       href="<?= get_post_type_archive_link( 'post' ) ?>">همه</a>
                </li>
                <?php
                foreach ( $categories as $category ) {
                    echo '<li class="nav-item"><a class="nav-link text-white fw-light p-0" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
if ( is_home() && ! is_category() && 1 == $paged ) {
    ?>
    <section class="py-5 container text-center">
        <h1 class="pb-2">
            <?php the_field( 'blog_title', 20 ); ?>
        </h1>
        <p class="pb-5 fw-bold">
            <?php the_field( 'blog_text', 20 ); ?>
        </p>
        <div class="row align-items-center justify-content-center pb-5">
            <div class="col-12 col-lg-10">
                <div class="swiper swiper3 swiper-custom px-3 overflow-visible">
                    <ul class="swiper-wrapper m-0 p-0 list-unstyled">
                        <?php
                        $args = array(
                                'post_type'           => 'post',
                                'post_status'         => 'publish',
                                'posts_per_page'      => '3',
                                'ignore_sticky_posts' => true
                        );
                        $loop = new WP_Query( $args );
                        if ( $loop->have_posts() ) : $i = 0;
                            /* Start the Loop */
                            while ( $loop->have_posts() ) :
                                $loop->the_post(); ?>
                                <li class="swiper-slide position-relative rounded-2">
                                    <div class="bg-white card-shadow  text-center row align-items-center">
                                        <div class="col-12 col-lg-8 pe-0">
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                 class="img-fluid"
                                                 alt="<?php the_title(); ?>">
                                        </div>
                                        <div class="col-12 col-lg-4 text-start">
                                            <div class="p-4">
                                                <?php
                                                $category_detail = get_the_category( $post->ID );//$post->ID
                                                foreach ( $category_detail as $category ) { ?>
                                                    <a href="<?php echo get_category_link( $category->term_id ) ?>"
                                                       class="small fw-lighter text-semi-light text-decoration-underline">
                                                        <?php echo $category->name ?>
                                                    </a>
                                                <?php } ?>
                                                <h5 class="card-title pt-5">
                                                    <?php the_title(); ?>
                                                </h5>
                                                <p class="pt-4 ">
                                                    <?php
                                                    $excerpt = get_the_excerpt();
                                                    $excerpt = substr( $excerpt, 0, 300 );
                                                    $excerpt = substr( $excerpt, 0, strripos( $excerpt, " " ) );
                                                    $excerpt = trim( preg_replace( '/\s+/', ' ', $excerpt ) );

                                                    echo $excerpt . '...';
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between p-4">
                                                <a href="<?php the_permalink(); ?>"
                                                   class="small text-semi-light text-decoration-underline">این
                                                    مقاله را بخوانید</a>
                                                <span class="small text-semi-light">پنج دقیقه</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile;
                        endif;
                        wp_reset_postdata(); ?>
                    </ul>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
if ( have_posts() ) :
    ?>
    <section class="py-5 container">
        <?php if ( is_category() ) { ?>
            <h5 class="text-start">
                <?php echo single_cat_title() ?>
            </h5>
        <?php } else { ?>
            <h5 class="text-start">
                جدیدترین پست‌های بلاگ دیجی‌فای
            </h5>
        <?php } ?>
        <div class="row">
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post(); ?>
                <div class="col-12 col-lg-6 p-4">
                    <?php get_template_part( 'template-parts/blog-post' ); ?>
                </div>
            <?php endwhile;
            ?>
        </div>
    </section>
    <div class="mt-5 pt-5">
    <?php
    $links = paginate_links( array(
            'type'      => 'array',
            'prev_next' => false,

    ) );
    if ( $links ) : ?>

        <nav aria-label="age navigation example">
            <?php echo '<ul class="pagination justify-content-center align-items-center">';
            // get_previous_posts_link will return a string or void if no link is set.
            if ( $prev_posts_link = get_previous_posts_link( __( 'قبلی' ) ) ) :
                echo '<li class="prev-list-item page-item me-4">';
                echo $prev_posts_link;
                echo '</li>';
            endif;
            echo '<li class="page-item me-4">';
            echo join( '</li><li class="page-item me-4">', $links );
            echo '</li>';

            // get_next_posts_link will return a string or void if no link is set.
            if ( $next_posts_link = get_next_posts_link( __( 'بعدی' ) ) ) :
                echo '<li class="next-list-item page-item me-4">';
                echo $next_posts_link;
                echo '</li>';
            endif;
            echo '</ul>';
            ?>
        </nav>

    <?php endif;
endif;
wp_reset_postdata();
?>
    </div>
<?php get_template_part( 'template-parts/action-banner' ); ?>

<?php
get_footer();
