<?php
// Get the post type and taxonomy
$post_type = get_post_type();
$taxonomy = 'product_categories';

// If the post type is "product" or the taxonomy is "products_categories"
if ($post_type === 'product' || is_tax($taxonomy)) {
    echo '<nav aria-label="breadcrumb">';
    echo '<ol class="breadcrumb">';

    // Home link
    echo '<li class="breadcrumb-item"><a class="text-white text-decoration-none fw-light" href="'.get_home_url().'">صفحه اصلی</a></li>';

    // Archive link for post type
    echo '<li class="breadcrumb-item"><a class="text-white text-decoration-none fw-light" href="'.get_post_type_archive_link($post_type).'">محصولات</a></li>';

    // Archive link for taxonomy
    if (is_tax($taxonomy)) {
        $term = get_queried_object();
        $term_link = get_term_link($term);
        echo '<li class="breadcrumb-item"><a class="text-white text-decoration-none fw-light" href="'.$term_link.'">'.$term->name.'</a></li>';
    }

    // Single post title
    if (is_singular($post_type)) {
        // Get the terms for the post
        $terms = get_the_terms(get_the_ID(), $taxonomy);

        // If there are terms, display them as breadcrumbs
        if (!empty($terms)) {
            $term = $terms[0];
            $term_link = get_term_link($term);
            echo '<li class="breadcrumb-item"><a class="text-white fw-bold" href="'.$term_link.'">'.$term->name.'</a></li>';
        }
        echo '<li class="breadcrumb-item active" aria-current="page">'.get_the_title().'</li>';
    }

    echo '</ol>';
    echo '</nav>';
}
?>
