<section class="container">
    <div class="row py-4 px-lg-5 justify-content-center">
            <span class="text-red pb-2 position-relative line-before" data-aos="zoom-in-right" data-aos-delay="100">
                <?php the_field('blog_title') ?>
            </span>
        <h4 class="text-dark-bg pb-4" data-aos="fade-up" data-aos-delay="300">
            <?php the_field('blog_small_title') ?>
        </h4>
        <div class="col-lg-8 col-12 row">
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
                    $loop->the_post(); $i++; ?>
                    <div class="col-lg-6 col-12 mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="<?= $i; ?>00">
                        <?php get_template_part( 'template-parts/blog-post' ); ?>
                    </div>
                <?php endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
        <div class="col-4">

        </div>
    </div>
</section>