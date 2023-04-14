<?php
get_header();
/* Template Name: Archive */
?>
<section class="position-relative min-vh-50 d-flex justify-content-center align-items-center">
    <img class="position-absolute w-100 h-100 start-0 top-0 object-fit"
         src="<?php echo get_field('blog_archive', 'option')['url'] ?>"
         alt="<?php the_title(); ?>">
    <div class="container z-top">
        <div class="row justify-content-start align-items-center text-white">
            <div class="col-8 text-start">
                <?php the_breadcrumb(); ?>
                <h1 class="fs-3 fw-bold">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </div>
</section>
    <section class="py-5">
        <div class="container pb-5">
            <?php
            if (have_posts()) :
            ?>
            <div class="text-center">
                <p class="h2"> مقالات</p>
            </div>
            <div class="row g-4">
                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post(); ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <?php get_template_part('template-parts/blog-post'); ?>
                    </div>
                <?php endwhile;
                ?>
            </div>
            <div class="mt-5 pt-5">
                <?php
                $links = paginate_links(array(
                    'type' => 'array',
                    'prev_next' => false,

                ));
                if ($links) : ?>

                    <nav aria-label="age navigation example">
                        <?php echo '<ul class="pagination justify-content-center align-items-center">';
                        // get_previous_posts_link will return a string or void if no link is set.
                        if ($prev_posts_link = get_previous_posts_link(__('قبلی'))) :
                            echo '<li class="prev-list-item page-item me-4">';
                            echo $prev_posts_link;
                            echo '</li>';
                        endif;
                        echo '<li class="page-item me-4">';
                        echo join('</li><li class="page-item me-4">', $links);
                        echo '</li>';

                        // get_next_posts_link will return a string or void if no link is set.
                        if ($next_posts_link = get_next_posts_link(__('بعدی'))) :
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
        </div>
    </section>


<?php get_footer();