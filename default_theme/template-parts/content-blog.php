<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package viplant_Theme
 */

?>
<li class="rounded-2xl !mb-20 h-auto">

  <article class="justify-items-center">

    <?php
    $imageSrcSet = 'https://via.placeholder.com/1000x400';
    if (get_post_thumbnail_id()) {
      $imageSrcSet =   wp_get_attachment_image_srcset(get_post_thumbnail_id());
    }

    ?>
    <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-1 lg:max-w-none">
      <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
        <div class="flex-shrink-0">
          <img class="h-48 w-full object-cover" srcset="<?php echo $imageSrcSet; ?>" alt="">
        </div>
        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="#" class="hover:underline"> <?php echo 'article'?> </a>
            </p>
            <a href="#" class="block mt-2">
              <?php the_title('<h3 class="text-xl font-bold text-black mt-3">', '</h3>'); ?>
              <div class="text-base  font-light text-black mb-2"><?php the_excerpt(); ?></div>
            </a>
          </div>
          <div class="mt-6 flex items-center">
            <div class="flex-shrink-0">
              <a href="#">
                <span class="sr-only">Roel Aufderehar</span>
                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </a>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium text-gray-900">
                <a href="#" class="hover:underline">  <?php theme_posted_by(); ?> </a>
              </p>
              <div class="flex space-x-1 text-sm text-gray-500">
                <time datetime="2020-03-16"> Mar 16, 2020 </time>
                <span aria-hidden="true"> &middot; </span>
                <span> 6 min read </span>
              </div>
            </div>
          </div>
        </div>
      </div>

  </article>
</li>