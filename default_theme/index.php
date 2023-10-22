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


<div class="h-24 w-full  flex flex-col mobile-padding lg:justify-center">
  <div class="flex items-center max-w-container-primary mx-auto w-full">
    <?php custom_bread_crumbs_rank_seo(); ?> 
  </div>
  <header class="entry-header max-w-content-container w-full mx-auto custom-header-title py-8">
    <h2 class="font-bold">
      <?php echo get_the_title(get_option('page_for_posts', true)); ?>
    </h2>

  </header><!-- .entry-header -->
</div>
<div class="w-full h-0 relative">
  <div class="custom-bg-header bg-default-header bg-headerBgMob bg-no-repeat desk:h-20 lg:bg-cover  desk:-top-20 lg:bg-headerBg w-full absolute h-20 -top-20 left-0"></div>
</div>


<main id="primary" class="teste max-w-content-container mx-auto pt-20 lg:pb-40 mobile-padding">
  <div class="blog-custom-post-title">
    <h1 class=" font-bold text-black">Descubra sobre plantas</h1>
  </div>
  <?php if (have_posts()) : ?>
    <div class="rounded-2xl w-full lg:w-full desk:px-2 mb-7 desk:flex-col-reverse flex">
      <ul class="post-container mt-4 ">
        <?php
        /* Start the Loop */

        while (have_posts()) :
          the_post();

          /**
           * Run the loop for the search to output the results.
           * If you want to overload this in a child theme then include a file
           * called content-search.php and that will be used instead.
           */

          get_template_part('template-parts/content', 'blog');

        endwhile;
        ?>
      </ul>


      <div class="desk:w-full w-1/5 desk:px-2 lg:px-8">
        <div class="w-full desk:border-none border-t border-grey pt-4">
          <p class="text-sm font-bold text-black">Categorias</p>
          <div class="flex flex-wrap w-64 h-auto leading-10">
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
              echo '<span class=" border border-black px-3 rounded-full mr-2 mb-2">
                                        <a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>
                                </span>';
            }
            ?>
          </div>
        </div>
        <div class="w-full mt-5">
          <p class="text-sm font-bold text-black">Tags</p>
          <div class="flex flex-wrap w-64 h-auto leading-10">
            <?php
            $posttags = get_tags();
            if ($posttags) {
              foreach ($posttags as $tag) {
                echo '<span class=" border border-black px-3 rounded-full mr-2 mb-2">
                                          <a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>
                                    </span>';
              }
            }
            ?>
          </div>
        </div>


      </div>
    </div>
    <div id="category-nav-links" class=" mt-18.5">
      <?php the_posts_pagination(array(
        'next_text' => __('...'),
        'prev_text' => __('')
      )); ?>

    </div>

  <?php
  else :

    get_template_part('template-parts/content', 'none');

  endif;
  ?>
  </div>
</main><!-- #main -->

<?php
get_footer();
