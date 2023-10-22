<?php
// TODO: Finish component, add switch case to user select heading

$titleGroup = get_field('title_group');
$title = '<' . $titleGroup['heading'] . ' class="h2 font-bold leading-[45px]" >' . $titleGroup['title'] . '</' . $titleGroup['heading'] . '>';
$link = get_field('link');

$backgroundImage = get_field('background_image');
$backgroundImageMobile = get_field('background_image_mobile');

$src = "";
$srcMobile = "";

if ($backgroundImage) {
    $src = $backgroundImage;
}

if ($backgroundImageMobile) {
    $srcMobile = $backgroundImageMobile;
}







?>

<?php # Mobile 
?>

<div class="bg-primary rounded-[32px] lg:hidden block_default">
    <div class="flex flex-col px-[18px] ml-1 rounded-3xl items-center justify-center text-center bg-content lg:hidden min-h-[280px] bg-gradient text-white  bg-no-repeat w-full mb-5 mt-[32px]" style="background-image: url( <?php echo $srcMobile; ?>);background-size: 100%;">
        <?php echo $title; ?>
        <div class="mt-[16px] w-full">
            <?php
            // Theme button
            get_template_part('template-parts/components/cv-link', 'button', array(
                'props' => array_merge(
                    $link,
                    [
                        'elementClass' => 'white secondary_btn_1 text-black w-full flex',
                    ],
                )
            ));
            ?>
        </div>

    </div>
</div>

<?php # Desktop 
?>

<div class="hidden rounded-3xl lg:block min-h-[240px] bg-gradient text-white bg-cover bg-no-repeat grid-base lg:mt-12 block_default" style="background-image: url(<?php echo $src; ?>);">
    <div class="flex flex-col justify-center items-center h-[239px]">
        <h2 class="h2 font-bold"><?php echo $title; ?></h2>
        <div class="mt-[32px] w-[220px]">
            <?php
            // Theme button
            get_template_part('template-parts/components/cv-link', 'button', array(
                'props' => array_merge(
                    $link,
                    [
                        'elementClass' => 'white secondary_btn_1  w-full flex',
                    ],
                )
            ));
            ?>
        </div>

    </div>

</div>