<?php
// TODO: Finish component, add switch case to user select heading



$title_group = get_field('title_group');
$image = get_field('image_group');
$description = get_field('description');
$link = get_field('link');
$faq_group = get_field('faq_group');

// Validate title group
$title = "";
// TODO: Refactor this to a helper function
if (isset($title_group) && isset($title_group['title']) && isset($title_group['heading'])) {
    $title = '<' . $title_group['heading'] . ' class="h2 font-bold leading-[120%] lg:mt-11" >' . $title_group['title'] . '</' . $title_group['heading'] . '>';
}

?>

<script>
    function openFaq(element) {
        element.classList.toggle("active")
    }
</script>

<div class="grid grid-cols-1 md:grid-cols-2 grid-base shadow-box px-4 lg:px-[64px] py-10 lg:py-[64px] rounded-[32px] lg:min-h-[500px] mt-8 lg:mt-12 block_default">
    <div class="flex flex-col justify-start">
        <div>
            <?php echo $title; ?>
        </div>
        <div class="subtitle lg:max-w-[454px] description_faq">
            <?php echo $description; ?>
        </div>

        <div class="mt-7 hidden lg:block">
            <?php
            if (isset($link) && $link) {
                get_template_part(
                    'template-parts/components/cv-link',
                    'button',
                    array(
                        'props' =>
                        array_merge($link, ['elementClass' => 'secondary_btn_1 lg:max-w-[220px]']),
                    ),
                );
            }
            ?>

        </div>
    </div>

    <div class="lg:pl-[80px] mt-6 lg:mt-0">
        <ul class="list-none bg-white">
            <?php foreach ($faq_group as $faq_object) :
            ?>
                <li onclick="openFaq(this)" class="max-h-[70px] faq-shadow  transition-all duration-500 overflow-hidden cursor-pointer faq_item_container">
                    <div class="flex items-center justify-between h-[70px]">
                        <div class="text-xl font-bold text-black"><?php echo $faq_object->post_title; ?> </div>
                        <img alt="arrow" width="20" height="20" class="transform -rotate-90 arrow-img transition-all duration-500" src="<?php echo get_template_directory_uri() . '/assets/img/orange-arrow.svg'; ?>" />
                    </div>

                    <div class="mb-6 text-sm text-grey-black w-11/12"><?php echo $faq_object->post_content; ?> </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="mt-8 lg:hidden">
            <?php
            if (isset($link) && $link) {
                get_template_part('template-parts/components/cv-link', 'button', array('props' => array_merge($link, ['color' => 'secondary', 'elementClass' => 'secondary_btn_1 lg:max-w-[220px]'])));
            }
            ?>

        </div>
    </div>

</div>