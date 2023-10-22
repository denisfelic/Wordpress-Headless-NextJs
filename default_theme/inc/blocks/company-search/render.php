<?php
// TODO: Finish component, add switch case to user select heading

$titleGroup = get_field('title_group');
$title = '<' . $titleGroup['heading'] . ' class="h2 font-bold leading-[120%]" >' . $titleGroup['title'] . '</' . $titleGroup['heading'] . '>';
$description = get_field('description');


// TODO API call

?>

<div class="grid-base lg:flex min-h-[424px] shadow-box rounded-[24px] px-4 lg:px-[64px] mt-8 lg:mt-12 block_default">
    <div class="flex flex-col justify-center max-w-[464px] pt-[54px] lg:justify-center lg:pt-0">
        <div>
            <?php echo $title; ?>
        </div>
        <div class="subtitle mt-2 lg:leading-[32px] lg:pt-3">
            <?php echo $description; ?>
        </div>
    </div>

    <div class=" pb-[46px] lg:pl-20 flex-1">
        <span class="pt-6 lg:pt-[56px] block">Encontre rapidamente o contacto de que necessita:</span>
        <form class="mt-3" id="search_company_form">
            <div class="flex flex-col">
                <label class="font-bold" for="search_company_form-country_input"> <?php echo __('País', 'default_theme'); ?></label>
                <select style="background: url(<?php echo get_template_directory_uri() . '/assets/img/orange-arrow.svg'; ?>);" class="input_default mt-1" name="" id="search_company_form-country_input">
                    <option value="pt"><?php echo  'Portugal' ?></option>
                    <option value="es"><?php echo  'Espanha' ?></option>
                    <option value="fr"><?php echo  'França' ?></option>
                </select>
                </label>
            </div>

            <div class="flex flex-col mt-4 lg:mt-[22px]">
                <label class="font-bold" for="search_company_form-company-input"> <?php echo __('Seguradora', 'default_theme'); ?> </label>
                <select style="background: url(<?php echo get_template_directory_uri() . '/assets/img/orange-arrow.svg'; ?>);" class="input_default mt-1" name="" id="search_company_form-company-input">
                    <option value="c1"><?php echo  'Company 1' ?></option>
                    <option value="c2"><?php echo  'Company 2' ?></option>
                    <option value="c3"><?php echo  'Company 3' ?></option>
                </select>

            </div>

            <div class="mt-7 lg:mt-10">
                <?php
                // Button
                get_template_part('template-parts/components/cv', 'button', array(
                    'props' => ['title' => __('Procurar', 'default_theme'), 'id' => 'search_company_btn_search', 'color' => 'secondary', 'elementClass' => 'primary_btn w-full']
                ));
                ?>
            </div>
        </form>

        <div class="hidden mt-6" id="search_company_results">
            <ul>
                <li class="list-none border rounded-[24px] border-grey px-4 py-5 lg:px-[32px] lg:py-[24px] mt-4">
                    <span class="text-[20px] text-primary font-bold ">Correspondentes</span>
                    <br />
                    <span class="mt-[10px] block text-[20px] text-black font-bold">Inter Partner Assistance</span>
                    <p>Avenida da Liberdade n.º 38 - 7.º andar <br> 1269-069, Lisboa <br> Portugal</p>
                    <p class="mt-3">T: +351 213 102 414</p>
                    <p>E: gestao.sinistros@ip-assistance.com</p>
                </li>
                <li class="list-none border rounded-[24px] border-grey px-4 py-5 lg:px-[32px] lg:py-[24px] mt-4">
                    <span class="text-[20px] text-primary font-bold ">Correspondentes</span>
                    <br />
                    <span class="mt-[10px] block text-[20px] text-black font-bold">Inter Partner Assistance</span>
                    <p>Avenida da Liberdade n.º 38 - 7.º andar <br> 1269-069, Lisboa <br> Portugal</p>
                    <p class="mt-3">T: +351 213 102 414</p>
                    <p>E: gestao.sinistros@ip-assistance.com</p>
                    <a class="mt-6 block" href="#">Visitar site ></a>
                </li>
            </ul>

            <?php
            // Button
            get_template_part('template-parts/components/cv', 'button', array(
                'props' => ['title' => __('Nova pesquisa', 'default_theme'), 'id' => 'search_company_btn_new_search', 'elementClass' => 'secondary_btn_1 bg-grey-light w-full mt-6']
            ));
            ?>
        </div>
    </div>
</div>

<script>
    // TODO: Create a js file for this script
    // TODO: implement api call and frontend logic
    document.addEventListener('DOMContentLoaded', () => {
        $('#search_company_btn_search').click((e) => {
            e.preventDefault();
            e.stopPropagation();
            $('#search_company_results').removeClass('hidden');
            $('#search_company_form').addClass('hidden')

        });

        $('#search_company_btn_new_search').click((e) => {
            e.preventDefault();
            e.stopPropagation();
            $('#search_company_results').addClass('hidden');
            $('#search_company_form').removeClass('hidden')


        });
    });
</script>