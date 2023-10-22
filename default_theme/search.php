<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Default_Theme
 */

get_header();
?>

<main id="primary" class="px-4 mt-[100px] lg:px-0">
    <div>

        <?php if (have_posts()) : ?>


            <div>
                <?php echo custom_bread_crumbs_rank_seo() ?>
            </div>
            <h1 class="page-title mt-6 text-center h3 font-bold mb-8">
                <?php
                /* translators: %s: search query. */
                printf(esc_html__('Search Results for: %s', 'default_theme'), '<span>' . get_search_query() . '</span>');
                ?>
            </h1>
        <?php
            /* Start the Loop */
            while (have_posts()) :
                the_post();

                /**
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part('template-parts/content', 'search');

            endwhile;

            the_posts_navigation();

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>

    </div>
</main><!-- #main -->

<?php
get_footer();
