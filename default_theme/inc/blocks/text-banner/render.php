<?php
// TODO: Finish component, add switch case to user select heading



$title_group = get_field('title_group');
$sub_title_group = get_field('subtitle_group');
$description = get_field('description');

// Validate title group
$title = "";
// TODO: Refactor this to a helper function
if (isset($title_group) && isset($title_group['title']) && isset($title_group['heading'])) {
    $title = '<' . $title_group['heading'] . ' class="h2 font-bold" >' . $title_group['title'] . '</' . $title_group['heading'] . '>';
}

// Validate title group
$subtitle = "";
// TODO: Refactor this to a helper function
if (isset($sub_title_group) && isset($sub_title_group['title']) && isset($sub_title_group['heading'])) {
    $subtitle = '<' . $sub_title_group['heading'] . ' class="subtitle font-bold text-grey-black" >' . $sub_title_group['title'] . '</' . $sub_title_group['heading'] . '>';
}

?>

<div class="min-h-[296px] grid-base text-center py-12 block_default">
    <div class="mt-[50px]">
        <?php echo $subtitle; ?>
    </div>
    <div class="mt-[14px]">
        <?php echo $title; ?>
    </div>

    <div class="max-w-[896px] mx-auto mt-4 subtitle mt-6">
        <?php echo $description; ?>
    </div>
</div>