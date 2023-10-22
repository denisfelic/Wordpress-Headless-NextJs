<?php
// TODO: Finish component, add switch case to user select heading

$title_group = get_field('title_group');
$bg_images = get_field('bg_images');
$cards = get_field('cards');

$bg_src_mobile = "";
$bg_src_desktop = "";


if (isset($bg_images) && isset($bg_images['desktop'])) {
    $bg_src_desktop = $bg_images['desktop'];
}

if (isset($bg_images) && isset($bg_images['mobile'])) {
    $bg_src_mobile = $bg_images['mobile'];
}


// Validate title group
$title = "";
// TODO: Refactor this to a helper function
if (isset($title_group) && isset($title_group['title']) && isset($title_group['heading'])) {
    $title = '<' . $title_group['heading'] . ' class="h2 font-bold leading-[120%]" >' . $title_group['title'] . '</' . $title_group['heading'] . '>';
}

$description = get_field('description');




?>

<div class="block lg:hidden mt-[32px] block_default">
    <div class=" bg-cover bg-no-repeat text-white rounded-[32px] <?php echo $cards ? 'min-h-[576px]' : 'pb-1' ?> " style="background-image: url(<?php echo $bg_src_mobile; ?>);">
        <div class="px-4 pt-[40px] mb-[40px]">
            <div class="text-center">
                <?php echo $title; ?>
            </div>
            <div class="subtitle text-center mt-4 max-w-[368px] mx-auto">
                <?php echo $description; ?>
            </div>
        </div>


        <?php
        if ($cards && isset($cards[0])) :
            $card_data_mobile['title'] = isset($cards[0]['card']['title']) ? $cards[0]['card']['title'] : '';
            $card_data_mobile['link_title'] = isset($cards[0]['card']['link']['title']) ? $cards[0]['card']['link']['title'] : '';
            $card_data_mobile['url'] = isset($cards[0]['card']['link']['url']) ? $cards[0]['card']['link']['url'] : '';
            $card_data_mobile['target'] = isset($cards[0]['card']['link']['target']) ? $cards[0]['card']['link']['target'] : '_self';
            $card_data_mobile['image'] = isset($cards[0]['card']['image']) ? $cards[0]['card']['image'] : '';
        ?>
            <div class="h-[392px] mx-auto w-full text-white bg-no-repeat bg-cover rounded-[24px] flex flex-col justify-center items-center" style="background-image: url('<?php echo $card_data_mobile['image']; ?>');">
                <h3 class="font-bold text-[40px] max-w-[330px] mx-auto text-center"><?php echo $card_data_mobile['title']; ?></h3>
                <div class="mt-[24px] w-full">
                    <?php
                    // button
                    get_template_part('template-parts/components/cv-link', 'button', array('props' => [
                        'title' => $card_data_mobile['link_title'],
                        'url' => $card_data_mobile['url'],
                        'target' => $card_data_mobile['target'],
                        'elementClass' =>  'secondary_btn_1 white text-black w-[90%] mx-auto'
                    ]));
                    ?>
                </div>
            </div>
        <?php endif ?>
    </div>
    <div class="mt-[24px] ">
        <?php
        if ($cards && isset($cards[1])) :
            $card_data_mobile['title'] = isset($cards[1]['card']['title']) ? $cards[1]['card']['title'] : '';
            $card_data_mobile['link_title'] = isset($cards[1]['card']['link']['title']) ? $cards[1]['card']['link']['title'] : '';
            $card_data_mobile['url'] = isset($cards[1]['card']['link']['url']) ? $cards[1]['card']['link']['url'] : '';
            $card_data_mobile['target'] = isset($cards[1]['card']['link']['target']) ? $cards[1]['card']['link']['target'] : '_self';
            $card_data_mobile['image'] = isset($cards[1]['card']['image']) ? $cards[1]['card']['image'] : '';
        ?>
            <div class="h-[392px] mx-auto w-full text-white bg-no-repeat bg-cover rounded-[24px] flex flex-col justify-center items-center" style="background-image: url('<?php echo $card_data_mobile['image']; ?>');">
                <h3 class="font-bold text-[40px] max-w-[330px] mx-auto text-center"><?php echo $card_data_mobile['title']; ?></h3>
                <div class="mt-[24px] w-full">
                    <?php
                    // button
                    get_template_part('template-parts/components/cv-link', 'button', array('props' => [
                        'title' => $card_data_mobile['link_title'],
                        'url' => $card_data_mobile['url'],
                        'target' => $card_data_mobile['target'],
                        'elementClass' =>  'secondary_btn_1 white text-black w-[90%] mx-auto'
                    ]));
                    ?>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>


<div class="hidden lg:block mt-12 block_default">

    <div class=" bg-cover bg-no-repeat text-white rounded-[32px] grid-base <?php echo $cards ? 'min-h-[576px]' : 'mb-[250px] pb-5' ?> " style="background-image: url(<?php echo $bg_src_desktop; ?>);">
        <div class="">
            <div class="pt-[90px] text-center">
                <?php echo $title; ?>
            </div>
            <div class="subtitle mt-4 text-center max-w-[896px] mx-auto">
                <?php echo $description; ?>
            </div>
        </div>

    </div>

    <div class="flex gap-[48px] -mt-[273px] justify-center">
        <?php
        if ($cards) :
            foreach ($cards as $key => $card) :
                if (!$card) {
                    continue;
                }
                $card_data['title'] = isset($card['card']['title']) ? $card['card']['title'] : '';
                $card_data['link_title'] = isset($card['card']['link']['title']) ? $card['card']['link']['title'] : '';
                $card_data['url'] = isset($card['card']['link']['url']) ? $card['card']['link']['url'] : '';
                $card_data['target'] = isset($card['card']['link']['target']) ? $card['card']['link']['target'] : '_self';
                $card_data['image'] = isset($card['card']['image']) ? $card['card']['image'] : '';
        ?>
                <div class="h-[392px] max-w-[440px] w-full text-white rounded-[24px] flex items-center bg-cover" style="background-image: url('<?php echo $card_data['image']; ?>');">
                    <div class="max-w-[336px] mx-auto">
                        <h3 class="text-center font-bold h2 mt-[10px] leading-[120%]"><?php echo $card_data['title']; ?></h3>
                        <div class="mt-[22px]">
                            <?php
                            // button
                            get_template_part('template-parts/components/cv-link', 'button', array('props' => [
                                'title' => $card_data['link_title'],
                                'url' => $card_data['url'],
                                'target' => $card_data['target'],
                                'elementClass' =>  'secondary_btn_1 white text-black max-w-[240px] mx-auto'
                            ]));
                            ?>
                        </div>
                    </div>

                </div>
        <?php endforeach;
        endif; ?>
    </div>
</div>