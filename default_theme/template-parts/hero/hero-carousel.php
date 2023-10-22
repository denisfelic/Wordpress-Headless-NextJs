<?php
if (!$args['carrousel_data']) {
    return;
}

$carrousel_data = $args['carrousel_data'];

?>

<div class="hero-carousel" id="hero-carousel">
    <?php foreach ($carrousel_data as $carrousel) :

        $image_id = '';
        if (isset($carrousel['image']['ID'])) {
            $image_id = $carrousel['image']['ID'];
        }
        $srcset = wp_get_attachment_image_srcset($image_id);
    ?>
        <div class="!w-screen relative !flex justify-center lg:justify-start">
            <div class="absolute w-full h-full bg-[#000] bg-opacity-40"></div>
            <div class="absolute top-[83px]  bottom-0 w-[95%]  z-10 flex flex-col min-h-fit max-w-[1200px] text-white grid-base h-fit my-auto pl-2 pt-2 lg:top-0 lg:w-full lg:left-0 lg:right-0 lg:pl-[146px] lg:pt-[34px]  ">
                <h3 class="h2 font-bold leading-[120%] max-w-[894px] w-full"><?php echo $carrousel['title'] ?></h3>
                <p class="subtitle mt-[11px] elipse-clamp max-w-[894px] w-full"><?php echo $carrousel['description'] ?></p>
                <div class="mt-5 w-full lg:max-w-[237px]">
                    <?php get_template_part('template-parts/components/cv-link', 'button', array(
                        'props' => array_merge($carrousel['link'], ['elementClass' => 'secondary_btn_2 text-white w-full flex bg-secondary hover:bg-secondary-black px-0 orange'])
                    ));
                    ?>
                </div>

            </div>
            <div class="paginator-center text-color text-center absolute bottom-6 left-0 right-0 mx-auto w-[136x] max-w-[136px]">
                <?php if (count($carrousel_data) > 1) : ?>
                    <ul class="flex justify-between w-full">
                        <li class="prev">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.525 0.550047C8.65833 0.68338 8.725 0.858383 8.725 1.07505C8.725 1.29171 8.65833 1.46672 8.525 1.60005L2.875 7.25005L15.25 7.25005C15.4667 7.25005 15.6458 7.32088 15.7875 7.46255C15.9292 7.60421 16 7.78338 16 8.00005C16 8.21672 15.9292 8.39588 15.7875 8.53755C15.6458 8.67922 15.4667 8.75005 15.25 8.75005L2.875 8.75005L8.525 14.4C8.65833 14.5334 8.725 14.7125 8.725 14.9375C8.725 15.1625 8.65833 15.3417 8.525 15.475C8.39167 15.6084 8.21667 15.675 8 15.675C7.78333 15.675 7.60833 15.6084 7.475 15.475L0.525 8.52505C0.441667 8.44171 0.383335 8.35838 0.350001 8.27505C0.316667 8.19171 0.3 8.10005 0.3 8.00005C0.3 7.91671 0.316667 7.82921 0.350001 7.73755C0.383335 7.64588 0.441667 7.55838 0.525 7.47505L7.475 0.525048C7.60833 0.391714 7.78334 0.329214 8 0.337548C8.21667 0.345881 8.39167 0.416714 8.525 0.550047Z" fill="white" />
                            </svg>
                        </li>
                        <li class="next">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.475 15.45C7.34167 15.3166 7.275 15.1416 7.275 14.925C7.275 14.7083 7.34167 14.5333 7.475 14.4L13.125 8.74995H0.75C0.533333 8.74995 0.354167 8.67912 0.2125 8.53745C0.0708334 8.39579 0 8.21662 0 7.99995C0 7.78328 0.0708334 7.60412 0.2125 7.46245C0.354167 7.32078 0.533333 7.24995 0.75 7.24995H13.125L7.475 1.59995C7.34167 1.46662 7.275 1.28745 7.275 1.06245C7.275 0.837451 7.34167 0.658285 7.475 0.524951C7.60833 0.391618 7.78333 0.324951 8 0.324951C8.21667 0.324951 8.39167 0.391618 8.525 0.524951L15.475 7.47495C15.5583 7.55829 15.6167 7.64162 15.65 7.72495C15.6833 7.80829 15.7 7.89995 15.7 7.99995C15.7 8.08328 15.6833 8.17078 15.65 8.26245C15.6167 8.35412 15.5583 8.44162 15.475 8.52495L8.525 15.475C8.39167 15.6083 8.21667 15.6708 8 15.6625C7.78333 15.6541 7.60833 15.5833 7.475 15.45Z" fill="white" />
                            </svg>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>

            <figure class="w-full">
                <img class="w-full h-[664px] lg:h-[696px] object-cover" srcset="<?php echo $srcset; ?>" title="<?php echo $carrousel['image']['title']; ?>" alt="<?php echo $carrousel['image']['alt']; ?>" />
                <figcaption class="sr-only"><?php echo $carrousel['image']['caption']; ?></figcaption>
            </figure>
        </div>
    <?php endforeach ?>
</div>