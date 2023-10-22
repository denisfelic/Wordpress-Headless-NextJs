<?php
if (!$args['hero']) {
    return;
}

$title = isset($args['hero']['title']) ? $args['hero']['title'] : '';
$subtitle = $args['hero']['subtitle'];


$backgroundImage = get_field('cvth_background_image_default_hero', 'option');
$backgroundImageMobile = get_field('cvth_background_image_default_hero_mobile', 'option');
$src  = "";
if ($backgroundImage) {
    $src = $backgroundImage['url'];
}

if ($backgroundImageMobile) {
    $srcMobile = $backgroundImageMobile['url'];
}
?>

<?php  // TODO: find better way to use custom background image from backend keep responsive (mobile and desktop images)  
?>
<style>
    .custom-theme-bg-1 {
        background-image: url('<?php echo $src; ?>');
    }

    @media screen and (max-width: 768px) {
        .custom-theme-bg-1 {
            background-image: url('<?php echo $srcMobile; ?> ');
        }

    }
</style>

<div class="custom-theme-bg-1 min-h-[504px] lg:min-h-[472px] h-full bg-cover  bg-no-repeat bg-center w-full text-white flex flex-col items-center lg:justify-center font-bold pt-36 lg:pt-0 pb-14 lg:pb-0">
    <div class="max-w-[896px] mx-auto px-[24px] lg:px-0 lg:pt-[74px] w-full">
        <h1 class="h1 leading-[120%] "> <?php echo get_the_title() ?> </h1>
        <h2 class="subtitle pr-3  mt-[15px] lg:mt-0"> <?php echo $subtitle ?></h2>
    </div>
</div>
<div class="mt-4 grid-base mx-auto lg:mt-[22px] flex justify-between mb-7 lg:mb-[62px]">
    <div>
        <?php echo custom_bread_crumbs_rank_seo() ?>
    </div>
    <div>

    </div>
</div>