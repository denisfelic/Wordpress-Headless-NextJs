<?php
// TODO: Finish component, add switch case to user select heading



$title_group = get_field('title_group');
$items = get_field('items');

$title = "";
// TODO: Refactor this to a helper function
if (isset($title_group) && isset($title_group['title']) && isset($title_group['heading'])) {
    $title = '<' . $title_group['heading'] . ' class="h2 font-bold leading-[120%]" >' . $title_group['title'] . '</' . $title_group['heading'] . '>';
}


?>
<div class="block_default">
    <div class="shadow-box px-4 grid-base rounded-[32px] my-[48px] py-10 lg:px-[152px]  lg:py-[120px] lg:pt-[88px] lg:pb-12 ">
        <div class="text-center">
            <?php echo $title; ?>
        </div>

        <div class="mt-5">
            <ul class="grid grid-cols-1 gap-[42px] lg:grid-cols-2 lg:gap-x-4 lg:gap-y-[26px]">
                <?php
                foreach ($items as $key => $item) :
                    $link['title'] = isset($item['link']['title']) ? $item['link']['title'] : '';
                    $link['url'] = isset($item['link']['url']) ? $item['link']['url'] : '';
                    $link['target'] = isset($item['link']['target']) ? $item['link']['target'] : '_self';
                ?>
                    <li class="flex flex-col items-center lg:flex-row lg:items-start lg:gap-4 lg:pt-[22px]">
                        <div class="w-16 h-16 rounded-full bg-grey-light grid place-items-center">
                            <span class="block text-gradient-green text-[29px]"><?php echo intval($key +  1) ?> </span>
                        </div>
                        <div class="mt-[10px] md:max-w-[311px] lg:mt-0">
                            <div class="text-center lg:text-left">
                                <span class="subtitle my-1"><?php echo $item['title']; ?></span>
                            </div>
                            <div class="text-grey-black text-sm">
                                <?php echo $item['text']; ?>

                            </div>
                            <?php if ($item && isset($item['link']['url'])) : ?>
                                <div class="w-full mt-4 lg:max-w-[235px]">
                                    <?php
                                    get_template_part('template-parts/components/cv-link', 'button', array('props' => [
                                        'title' => $link['title'],
                                        'url' => $link['url'],
                                        'target' => $link['target'],
                                        'elementClass' =>  'terciary_btn lg:px-0'
                                    ])); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    </li>

                <?php endforeach; ?>
            </ul>

        </div>

    </div>
</div>