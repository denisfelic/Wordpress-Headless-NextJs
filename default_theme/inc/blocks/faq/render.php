<?php
// script -> faq-filter-component.js

$faq_topics = get_terms([
    'taxonomy' => 'topic',
    'hide_empty' => true,
]);
$faq_section_array = [];
foreach ($faq_topics as $key => $faq) {

    $posts_array = get_posts(
        array(
            'posts_per_page' => -1,
            'post_type' => 'FAQs',
            'tax_query' => array(
                array(
                    'taxonomy' => 'topic',
                    'field' => 'term_id',
                    'terms' => $faq->term_id,
                )
            )
        )
    );
    $faq_section_array[] = [
        'faq_header' => $faq,
        'faq_list' => $posts_array
    ];
}

?>


<section class="flex block_default" id="faq-component-container">
    <div>
        <ul>
            <?php foreach ($faq_topics as $key => $faq_object) :  ?>
                <li><button class="p-5 bg-grey-light faq-button" data-js="faq-btn" data-js-faq-btn-id="<?php echo $faq_object->term_id ?>"><?php echo $faq_object->name; ?></button></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div>

        <?php foreach ($faq_section_array as $key => $faq_section) :
        ?>
            <div class="p-2 my-5 " data-js-faq-section-id="<?php echo $faq_section['faq_header']->term_id ?>">
                <h4 class="h3">
                    <?php echo $faq_section['faq_header']->name ?>
                </h4>
                <ul class="list-none">
                    <?php foreach ($faq_section['faq_list'] as $faq_object) :
                    ?>
                        <li class="p-5 border-b ">
                            <h5 class="subtitle font-bold"><?php echo  $faq_object->post_title ?> </h5>
                            <p>
                                <?php echo $faq_object->post_content ?>
                            </p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        <?php endforeach; ?>
    </div>
</section>