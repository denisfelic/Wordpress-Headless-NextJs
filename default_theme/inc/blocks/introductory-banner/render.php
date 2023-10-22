<?php
// TODO: Finish component, add switch case to user select heading



$title_group = get_field('title_group');
$description = get_field('description');
$short_code = get_field('shortcode');

// Validate title group
$title = "";
// TODO: Refactor this to a helper function
if (isset($title_group) && isset($title_group['title']) && isset($title_group['heading'])) {
    $title = '<' . $title_group['heading'] . ' class="h2 font-bold leading-[120%]" >' . $title_group['title'] . '</' . $title_group['heading'] . '>';
}


?>
<div class="grid grid-cols-1 md:grid-cols-2 shadow-box rounded-[32px] mb-12 px-0 grid-base py-10 lg:py-0 block_default">
    <div class="flex items-center lg:items-center px-4 lg:pl-[64px] lg:py-[108px] lg:!pt-[132px] ">
        <div class="max-w-[464px]">
            <?php echo $title; ?>
        </div>

    </div>

    <div class="flex flex-col justify-center lg:justify-center px-4 pt-4 lg:!pr-8 lg:py-10">
        <div class="subtitle">
            <?php echo $description; ?>
        </div>
    </div>
</div>