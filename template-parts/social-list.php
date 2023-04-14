<?php
if (have_rows('social_list', 'option')):
    while (have_rows('social_list', 'option')) : the_row();
        $title = get_sub_field('title');
        $icon = get_sub_field('icon');
        $url = get_sub_field('link'); ?>
        <li>
            <a class="text-white text-decoration-none" href="<?php echo esc_url($url); ?>">
                <i title="<?= $title; ?>" class="<?php echo $icon; ?> d-flex align-items-center"></i>
            </a>
        </li>
    <?php endwhile;
endif;
?>