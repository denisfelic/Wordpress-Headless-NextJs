<?php
// TODO: Finish component, add switch case to user select heading
$items = get_field('items');

?>




<div class="grid-base w-full flex justify-center mt-6 mb-[47px] pb-[61px] block_default border-b lg:border-grey-light content-box-manager lg:max-w-[926px]">
    <div class="w-full flex justify-center">
        <ul class="w-full grid grid-cols-2 gap-y-[28px] lg:flex lg:flex-wrap lg:gap-x-[180px] lg:gap-y-[42px] lg:max-w-[804px] lg:justify-center">
            <?php
            foreach ($items as $key => $item) :
            ?>
                <li class="flex flex-col items-center">
                    <img class="w-[96px] h-[96px] object-cover rounded-full <?php if ($item['image'] === false) echo 'hidden' ?>" src="<?php echo $item['image']['url'] ?>" alt="<?php echo $item['image']['alt'] ?>">
                    <div class="text-center mt-2">
                        <p class="text-xl text-grey-black"> <?php echo $item['name']; ?></p>
                        <p class="text-sm text-grey-black"> <?php echo $item['title']; ?></p>
                        <div class="w-[132px] h-11 overflow-hidden mt-[6px] mx-auto">
                            <img src="https://picsum.photos/200/300" />
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
