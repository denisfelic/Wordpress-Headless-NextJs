<?php
$title_group = get_field('title_group');
// $description = get_field('description');

$title = "";
// // TODO: Refactor this to a helper function

if (isset($title_group) && isset($title_group['title']) && isset($title_group['heading'])) {
    $title = '<' . $title_group['heading'] . ' class="h2 font-bold !mb-[26px] lg:mb-10" >' . $title_group['title'] . '</' . $title_group['heading'] . '>';
}

?>
<div class="grid-base mx-auto mb-12 md:mb-[120px] lg:px-[65px] block_default">
    <div class="text-center mx-auto max-w-[234px] md:max-w-none">
        <?php echo $title; ?>
    </div>
    <ul id="associative-component-header" data-js="associative-component-header"></ul>
    <div id="associative-component-results" data-js="associative-component-results"></div>

</div>

<script>
    // TODO: Refactor this to the JS components files

    window.addEventListener('DOMContentLoaded', () =>{
        window.associates().init();
    })
</script>