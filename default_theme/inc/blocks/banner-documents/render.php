<?php
// TODO: Finish component, add switch case to user select heading

$title_group = get_field('title_group');
$description = get_field('description');

// Validate title group
$title = "";
// TODO: Refactor this to a helper function
if (isset($title_group) && isset($title_group['title']) && isset($title_group['heading'])) {
    $title = '<' . $title_group['heading'] . ' class="h2 font-bold leading-[120%]" >' . $title_group['title'] . '</' . $title_group['heading'] . '>';
}

$description = get_field('description');

$cards = get_field('areas');

?>

<div class="grid grid-cols-1 lg:grid-cols-2 grid-base px-4 py-12  lg:p-[64px] lg:py-[64px]  rounded-[32px] min-h-[304px] block_default">
    <div class="flex flex-col justify-center">
        <div>
            <?php echo $title; ?>
        </div>
        <div class="subtitle mt-4">
            <?php echo $description; ?>
        </div>
    </div>

    <div class="mt-[32px] lg:mt-0">
        <ul class="list-none grid grid-cols-1 lg:grid-cols-2 gap-5">
            <?php foreach ($cards as $card) :
                if (!$card || $card && !isset($card['area']->term_id)) {
                    continue;
                }

                $total_posts = count(get_posts(
                    array(
                        'posts_per_page' => -1,
                        'post_type' => 'document-section',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'document-topics',
                                'field' => 'term_id',
                                'terms' => $card['area']->term_id,
                            )
                        )
                    )
                ));

            ?>
                <li class="h-20 border border-grey-light flex items-center justify-center rounded-[10px] list-none no-underline hover:bg-grey-light active:bg-grey-light cursor-pointer">
                    <a style="text-decoration: none;" class="text-black font-bold list-none outline-none" target="<?php echo $card['link']['target'] ?>" href="<?php echo $card['link']['url'] ?>"><?php echo $card['link']['title']; ?> (<?php echo $total_posts; ?>)</a>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>
</div>