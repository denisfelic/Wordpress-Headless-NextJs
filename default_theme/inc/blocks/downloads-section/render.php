<?php
$areas_list = get_field('areas');
if (!$areas_list || !is_array($areas_list)){
    return;
}

foreach ($areas_list as $key => $area_object) :
    if (!isset($area_object['area']) || !isset($area_object['area']->ID)){
        continue;
    }

    $args = array(
        'p' => $area_object['area']->ID,
        'post_type' => 'downloads-section',
        'posts_per_page' => '-1',
    );

    $the_query = new WP_Query($args);

    if (!$the_query->have_posts()) return;
?>

    <section class="row lg:pl-10 xl:pl-0 lg:w-10/12 xl:w-11/12 my-5 block_default">

        <?php

        if ($the_query->have_posts()) :
        ?>

            <div id="all">
                <?php

                while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                    <div>
                        <div class="block-content">
                            <h3><strong><?php the_title(); ?></strong></h3>
                            <?php
                            $downloads = get_field('downloads', get_the_ID());
                            if ($downloads) :

                            ?>
                                <div class="tab-downloads">

                                    <?php foreach ($downloads as $file) :
                                        $title = $file['title'];
                                        $description = $file['description'];
                                    ?>
                                        <h4 class="title"><?php echo $title; ?> </h4>
                                        <div>
                                            <?php echo $description; ?>
                                        </div>
                                        <a class="btn-download" href="<?php echo $file['document']['url'] ?? "#" ?>">
                                            <?php echo $file['button_label'] ?? __('Download', 'cctr'); ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            </div>
    </section>
<?
endforeach;
