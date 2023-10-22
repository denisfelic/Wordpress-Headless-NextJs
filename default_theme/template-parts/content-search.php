<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Default_Theme
 */

$keys = implode('|', array_filter(explode(' ', get_search_query())));
$title = preg_replace('/(' . $keys . ')/iu', '<span class="text-primary">\0</span>', get_the_title());
$excerpt = preg_replace('/(' . $keys . ')/iu', '<span class="text-primary">\0</span>', get_the_excerpt());

?>

<article class="max-w-[970px] mx-auto" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section>
        <a class="no-underline" href="<?php echo esc_url( get_permalink() ); ?>">
            <section class="border-t p-5 flex w-full cursor-pointer">
                <article class="w-full truncate">
                    <h3 class="entry-title subtitle font-bold text-black"><?php echo $title; ?></h3>
                    <div class="max-w-[638px]"><p class="subtitle truncate"><?php echo $excerpt; ?></p></div>
                </article>
                <article class="pl-4 bg-g flex items-center" alt="<?php echo strip_tags($title); ?>">
                <img class="transform -rotate-90 arrow-img transition-all duration-500" src="<?php echo get_template_directory_uri() . '/assets/img/orange-arrow.svg'; ?>" />

                 </article>
            </section>
        </a>
    </section>


</article><!-- #post-<?php the_ID(); ?> -->
