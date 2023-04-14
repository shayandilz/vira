<?php global $post; ?>

<div class="card single-post-img bg-transparent border-0 text-bg-dark lazy">
    <div class="position-relative overflow-hidden">
        <img src="<?php echo get_the_post_thumbnail_url() ?>" class="card-img lazy" alt="<?php the_title(); ?>">
    </div>
    <h6 class="card-title text-dark fw-bold pb-3 pt-4 mb-0">
        <?php the_title(); ?>
    </h6>
    <div class="d-inline-flex align-items-center justify-content-start">
        <?php echo get_the_date('d  F , Y'); ?>
        /
        <?php
        $category_detail = get_the_category($post->ID);//$post->ID
        foreach($category_detail as $category) { ?>
            <a href="<?= get_category_link( $category->term_id )  ?>" class="text-decoration-none py-2 px-3 me-2 fs-6 fw-lighter text-dark">
                <?php echo $category->name?>
            </a>
        <?php } ?>
    </div>
    <?php
    $excerpt = get_the_excerpt();
    $excerpt = substr( $excerpt, 0, 300 );
    $excerpt = substr( $excerpt, 0, strripos( $excerpt, " " ) );
    $excerpt = trim( preg_replace( '/\s+/', ' ', $excerpt ) );

    echo $excerpt . '...';
    ?>
    <a class="small fw-lighter d-flex align-items-center gap-3 stretched-link pt-3" href="<?php the_permalink(); ?>">
        ادامه مطلب
        <?php get_template_part('template-parts/SVG/arrow-icon'); ?>
    </a>
</div>
