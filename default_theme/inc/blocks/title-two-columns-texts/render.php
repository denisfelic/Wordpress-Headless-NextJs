<?php
// TODO: Finish component, add switch case to user select heading



$title_group = get_field('title_group');
$description = get_field('description');
$description_two = get_field('description_two');

$title = "";
// TODO: Refactor this to a helper function
if (isset($title_group) && isset($title_group['title']) && isset($title_group['heading'])) {
    $title = '<' . $title_group['heading'] . ' class="h2 font-bold" >' . $title_group['title'] . '</' . $title_group['heading'] . '>';
}

 
?>

<script>
    window.addEventListener('load', () => {
        let linkvar =   document.querySelector('.description_block_links a')
        linkvar.parentNode.classList.add('mt-8')
    })
</script>

<div class="grid grid-cols-1 md:grid-cols-2 gap-5 shadow-box grid-base px-[16px] py-10 lg:py-[32px] lg:p-[64px] rounded-[32px] mt-8 lg:mt-[62px] block_default">
    <div class="lg:pt-[35px]">
        <div>
            <?php echo $title; ?>
        </div>
        <div class="subtitle mt-[32px] lg:mt-6">
            <?php echo $description; ?>
        </div>
 
    </div>

    <div>
    <div class="subtitle description_block_links lg:pt-10">
            <?php echo $description_two; ?>
        </div>
    </div>

</div>