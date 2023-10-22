<?php
// script -> faq-filter-component.js
$faq_topics_ids = array_column(get_field('faq_topics'), 'topic');

$faq_topics = get_terms([
    'taxonomy' => 'topic',
    'hide_empty' => true,
    'include' => $faq_topics_ids,
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

<script>
    function openFaq(element) {
        element.classList.toggle("active")
    }
</script>

<section id="faq-component-container" class="mt-12 shadow-box rounded-2xl px-4 py-10 grid-base mx-auto lg:pl-16 lg:pr-20 lg:pt-[32px] lg:pb-12 lg:rounded-[32px] block_default">
    <div>
        <nav class="flex lg:flex-wrap lg:justify-center lg:grid-cols-3 gap-4 w-full overflow-x-scroll p-3 hide-scroll-bar lg:max-w-[600px] lg:mx-auto">
            <button class="filter-button active" data-js="document-filter-reset-btn">
                <?php echo __('Todos', 'default_theme'); ?>
            </button>
            <?php foreach ($faq_topics as $faq_object) :  ?>
                <button class="filter-button" data-js="faq-btn" data-js-document-list-filter-btns="<?php echo $faq_object->term_id ?>"><?php echo $faq_object->name; ?></button>
            <?php endforeach; ?>
        </nav>
    </div>

    <div class=" px-4 lg:px-[94px]">
        <?php foreach ($faq_section_array as $faqKey => $faq_section) :
        ?>
            <div class="p-2 my-5 pt-10 lg:pt-[54px] !mt-0" data-js-section-topic-id="<?php echo $faq_section['faq_header']->term_id ?>" data-js-doc-section-id="<?php echo $faq_section['faq_header']->term_id ?>" data-js-faq-section-id="<?php echo $faq_section['faq_header']->term_id ?>">
                <h3 class="text-black font-bold text-center">
                    <?php echo $faq_section['faq_header']->name ?> <span>(<?php echo count($faq_section['faq_list']); ?>)</span>
                </h3>
                <ul class="list-none">
                    <?php foreach ($faq_section['faq_list']  as $key => $faq_object) :
                    ?>
                        <li onclick="openFaq(this)" data-js-doc-list-section-id="<?php echo $key ?>" class="max-h-[70px] faq-shadow transition-all duration-500 overflow-hidden cursor-pointer faq_item_container">
                            <div class="flex items-center justify-between h-[70px]">
                                <div class="pr-2">
                                    <h5 class="text-xl font-bold text-black truncate"><?php echo  $faq_object->post_title ?> </h5>
                                </div>
                                <img class="transform -rotate-90 arrow-img transition-all duration-500" src="<?php echo get_template_directory_uri() . '/assets/img/orange-arrow.svg'; ?>" />
                            </div>
                            <div class="mb-6 text-sm text-grey-black w-11/12">
                                <?php echo $faq_object->post_content ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="flex justify-center">
                    <button data-js-doc-list-button-id="<?php echo $faq_section['faq_header']->term_id ?>" class="filter-button my-6 md:px-20">
                        <?php echo __('Carregar mais', 'default_theme'); ?>
                    </button>
                </div>

            </div>

        <?php endforeach; ?>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        faqSection.DocumentHeaderFilter().init();
        faqSection.LoadMore().init();
    })
</script>