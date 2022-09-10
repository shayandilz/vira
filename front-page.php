<?php /* Template Name: Home */
get_header(); ?>


<?php if (have_posts()) {
    the_post(); ?>


    <!--  Slider  -->
    <?php get_template_part('template-parts/home-component/slider'); ?>
    <!--  Category Listing  -->
    <?php get_template_part('template-parts/home-component/category-listing'); ?>
    <!--  About us  -->
    <?php get_template_part('template-parts/home-component/about'); ?>
    <!--  Why us  ( Part one )  -->
    <?php get_template_part('template-parts/home-component/why-us'); ?>
    <!--  Why  us ( Part two ) -->
    <?php get_template_part('template-parts/home-component/why-us2'); ?>
    <!--  Services  -->
    <?php get_template_part('template-parts/home-component/services'); ?>
    <!--  Blog  -->
    <?php get_template_part('template-parts/home-component/blog'); ?>
<?php }
get_footer();
