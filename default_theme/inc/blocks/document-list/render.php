<?php
$areas_list = get_field('areas');
if (!$areas_list || !is_array($areas_list)) {
    return;
}

$sections_array = [];
foreach ($areas_list as $key => $area_object) :

    $posts_array =  get_posts(
        array(
            'posts_per_page' => -1,
            'post_type' => 'document-section',
            'tax_query' => array(
                array(
                    'taxonomy' => 'document-topics',
                    'field' => 'term_id',
                    'terms' => $area_object['area']->term_id,
                )
            )
        )
    );
    $sections_array[] = [
        'header' =>  [
            'id' => $area_object['area']->term_id,
            'title' =>  $area_object['area']->name,
            'total' => count($posts_array),
        ],
        'posts' => $posts_array
    ];

endforeach;

// TODO: filter

?>

<section id="document-list-block" class="mt-12 shadow-box rounded-2xl px-4 py-10 grid-base mx-auto my-12 lg:pl-16 lg:pr-20 lg:pt-[48px] lg:pb-12 lg:rounded-[32px] block_default">
    <div class="mb-8">
        <nav class="flex gap-4 w-full overflow-x-scroll p-3 hide-scroll-bar lg:px-0">
            <button class="filter-button active" data-js="document-filter-reset-btn">
                <?php echo __('Todos', 'default_theme'); ?>
            </button>
            <?php foreach ($areas_list as $document_topic) : ?>
                <button class="filter-button" data-js-document-list-filter-btns="<?php echo $document_topic['area']->term_id ?>">
                    <?php echo $document_topic['area']->name ?>
                </button>
            <?php endforeach; ?>
        </nav>
    </div>
    <div class="flex flex-col gap-10">
        <?php foreach ($sections_array as $sectionKey => $section) :
        ?>

            <div data-js-section-topic-id="<?php echo $section['header']['id'] ?>" data-js-doc-section-id="<?php echo $sectionKey; ?>">
                <h3 class="text-black font-bold"><?php echo $section['header']['title'] ?> <span>(<?php echo $section['header']['total'] ?>)</span> </h3>
                <ul class="list-none flex flex-col gap-10">
                    <?php foreach ($section['posts'] as $key => $post) :
                        $document_resource = get_field('section_type', $post->ID);
                        $is_download = false;
                        $link_url = "#";
                        $target = '_self';
                        if ($document_resource === 'download') {
                            $is_download = true;
                            $link_url = get_field('document', $post->ID);
                            $target = '_blank';
                        } else {
                            $link_object = get_field('link', $post->ID);
                            $link_url = $link_object['url'];
                            $target = $link_object['target'];
                        }


                    ?>
                        <li class="flex flex-col gap-4" data-js-doc-list-section-id="<?php echo $key ?>">
                            <h5 class="title"><?php echo $post->post_title; ?> </h5>
                            <div>
                                <?php echo $post->post_content; ?>
                            </div>
                            <?php if ($link_url) : ?>
                                <a class="w-full h-12 font-bold no-underline p-5 terciary_btn  rounded-2xl flex justify-center gap-2 items-center md:w-fit md:px-20" href="<?php echo $link_url; ?>" target="<?php echo $target; ?>" download>
                                    <span>
                                        <?php echo $is_download ? __('Download', 'default_theme') : __('Ver website', 'default_theme'); ?>
                                    </span>
                                    <?php if ($is_download) : ?>
                                        <i>
                                            <?php echo "" ?>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 20C5.1 20 4.75 19.85 4.45 19.55C4.15 19.25 4 18.9 4 18.5V14.925H5.5V18.5H18.5V14.925H20V18.5C20 18.9 19.85 19.25 19.55 19.55C19.25 19.85 18.9 20 18.5 20H5.5ZM12 16.175L7.175 11.35L8.25 10.275L11.25 13.275V4H12.75V13.275L15.75 10.275L16.825 11.35L12 16.175Z" fill="#484848" />
                                            </svg>
                                        </i>
                                    <?php endif ?>
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="flex w-full justify-center ">
                    <button data-js-doc-list-button-id="<?php echo $sectionKey ?>" class="filter-button my-6 md:px-20"><?php echo __('Carregar mais', 'default_theme'); ?></button>
                </div>

                <div class="pt-4 px-4 lg:pt-6 lg:px-0">
                    <div class="border-b border-b-grey flex w-full"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.documentSection.DocumentHeaderFilter().init();
        window.documentSection.LoadMore().init();
    })
</script>