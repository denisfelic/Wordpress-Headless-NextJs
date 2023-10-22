<?php
// TODO: Finish component, add switch case to user select heading



$title_group = get_field('title_group');
$morada = get_field('location');
$contact = get_field('contact');
$notification = get_field('notification');


$short_code = get_field('shortcode');

//ddd($morada, $contact, $notification);

// Validate title group
$title = "";
// TODO: Refactor this to a helper function
if (isset($title_group) && isset($title_group['title']) && isset($title_group['heading'])) {
    $title = '<' . $title_group['heading'] . ' class="h2 font-bold" >' . $title_group['title'] . '</' . $title_group['heading'] . '>';
}

?>

<div class="acf-block grid grid-cols-1 shadow-box rounded-[32px] py-10 mt-7  md:grid-cols-2 grid-base px-4 lg:mt-[63px] lg:px-[64px] block_default ">
    <div class="flex flex-col justify-center lg:pr-20">
        <h2 class="font-bold"><?php echo __('Contacte-nos', 'default_theme'); ?></h2>
        <div class="mt-4">
            <?php echo $title; ?>
        </div>
        <div>
            <div>
                <h3 class="subtitle"><strong>Morada</strong></h3>
                <?php echo $morada; ?>
            </div>

            <div class="mt-4">
                <h3 class="subtitle"><strong>Contactos</strong></h3>
                <?php echo $contact; ?>
            </div>
            <div class="caption text-grey-black my-6 mt-10">
                <?php echo $notification; ?>
            </div>
        </div>
    </div>

    <div>
        <?php echo do_shortcode($short_code); ?>
    </div>

</div>