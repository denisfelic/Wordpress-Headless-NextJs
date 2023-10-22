<?php
// TODO: Finish component, add switch case to user select heading



$title_group = get_field('title_group');
$subtitle_group = get_field('subtitle_group');
$description = get_field('description');
$items = get_field('items');

$image = get_field('image_group');
$link = get_field('link');


// Validate title group
$title = "";
// TODO: Refactor this to a helper function
if (isset($title_group) && isset($title_group['title']) && !empty($title_group['title']) && isset($title_group['heading'])) {
    $title = '<' . $title_group['heading'] . ' class="h2 font-bold mt-5 leading-[120%]" >' . $title_group['title'] . '</' . $title_group['heading'] . '>';
}

$subtitle = "";
// TODO: Refactor this to a helper function
if (isset($subtitle_group) && isset($subtitle_group['title'])  && !empty($subtitle_group['title'])  && isset($subtitle_group['heading'])) {
    $subtitle = '<' . $subtitle_group['heading'] . ' class="subtitle text-grey-black font-bold" >' . $subtitle_group['title'] . '</' . $subtitle_group['heading'] . '>';
}

?>

<div class="grid-base px-0  shadow-box rounded-[32px] mt-8 lg:mt-12 block_default">
    <?php
    if (strlen($title) > 1 || strlen($subtitle) > 1 || strlen($description) > 1) : ?>
        <div class="text-center py-12 max-w-[910px] mx-auto">
            <div class="">
                <?php echo $subtitle; ?>
            </div>
            <div class="mt-[18px]">
                <?php echo $title; ?>
            </div>
            <div class="mt-5 subtitle">
                <?php echo $description; ?>
            </div>
        </div>
    <?php endif; ?>

    <div>
        <?php if (isset($items) && count($items) > 0) :
            foreach ($items as $item) :
                $item_title = "";
                // TODO: Refactor this to a helper function
                if (isset($title_group) && isset($item['title_group']['title']) && !empty($item['title_group']['title']) && isset($item['title_group']['heading'])) {
                    $item_title = '<' . $item['title_group']['heading'] . ' class="h2 font-bold  leading-[120%]" >' . $item['title_group']['title'] . '</' . $item['title_group']['heading'] . '>';
                }

                $item_description = $item['description'];
                $item_link = $item['link'];
                $item_bg_src = isset($item['image_group']['desktop']) ?  $item['image_group']['desktop'] : '';
                if (isset($item['image_position']) && $item['image_position'] == 'right') {

                    $container_class = "grid grid-cols-1 rounded-[32px] md:grid-cols-2  px-0 lg:min-h-[800px]  overflow-hidden lg:flex lg:flex";
                } else {
                    $container_class = "grid grid-cols-1 rounded-[32px] md:grid-cols-2  px-0 lg:min-h-[800px]  overflow-hidden lg:flex lg:flex-row-reverse";
                }


        ?>
                <div class="<?php echo $container_class; ?>">
                    <div class="px-4 lg:px-[64px] flex flex-col justify-center lg:justify-center lg:pt-0 lg:flex-1">
                        <div class="mt-9">
                            <?php echo $item_title; ?>
                        </div>
                        <div class="subtitle mt-[25px] first-bottom">
                            <?php echo $item_description; ?>
                        </div>

                        <?php if ($item_link) : ?>
                            <div>
                                <?php

                                get_template_part('template-parts/components/cv-link', 'button', array('props' => array_merge($item_link, ['color' => 'secondary', 'elementClass' => 'secondary_btn_1 lg:max-w-[264px] mt-8'])));
                                ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="h-[312px] lg:h-auto w-full lg:max-w-[592px] mt-10 lg:mt-0">
                        <?php if ($item_bg_src) : ?>
                            <img class="w-full h-full object-cover lg:max-w-[]" width="600" height="800" alt="meet-us" src="<?php echo $item_bg_src ?>" />
                        <?php endif; ?>
                    </div>

                </div>
        <?php endforeach;
        endif; ?>
    </div>
</div>