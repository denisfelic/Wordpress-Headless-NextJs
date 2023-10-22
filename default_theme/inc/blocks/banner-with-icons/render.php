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
    <div class="shadow-box px-4 lg:px-[152px] py-10 lg:py-[120px] pt-10 lg:pt-[88px] grid-base rounded-[32px] my-[48px]">
        <div class="text-center">
            <?php echo $title; ?>
        </div>

        <div class="mt-10">
            <ul class="grid grid-cols-1 lg:grid-cols-2 gap-x-[64px] gap-y-[32px] lg:gap-y-10">
                <?php
                foreach ($items as $key => $item) :

                ?>
                    <li class="flex items-center">
                        <?php if (isset($item['image']['url'])) : ?>
                            <img class="w-[64px] h-[64px] mr-4 rounded-full" src="<?php echo $item['image']['url'] ?>" alt="<?php echo $item['image']['alt'] ?>">
                        <?php endif; ?>
                        <div class="text-grey-black text-sm lg:w-[70%]">
                            <?php echo $item['text']; ?>
                        </div>
                    </li>

                <?php endforeach; ?>
            </ul>

        </div>

    </div>
</div>