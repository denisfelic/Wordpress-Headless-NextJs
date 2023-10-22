<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Default_Theme
 */

?>
<footer class="mt-[48px]">
    <div class="grid-base mx-auto" aria-labelledby="footer-heading">
        <div class="w-fit mx-auto mb-[24px]">
            <?php echo get_custom_logo($blog_id = 0); ?>
        </div>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'footer_menu',
        ));
        ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>