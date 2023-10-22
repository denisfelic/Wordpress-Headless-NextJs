<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Carta_Verde
 */

?>
<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Carta_Verde
 */

get_header();
?>

<main id="primary" class="site-main grid-base relative w-full">
    <section class="error-404 not-found">
        <div class=" min-h-full py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8 my-auto">
            <div class="max-w-max mx-auto">
                <main class="sm:flex">
                    <div class="lg:mb-2">
                        <p class="text-primary text-center text-[150px] font-black leading-none lg:leading-[142px]">404</p>
                    </div>
                    <div class="mt-2">
                        <div class="sm:border-l sm:border-gray-200 sm:pl-6 lg:max-w-[440px]">
                            <h1 class="h2 text-center text-black leading-[52px] lg:mb-1"><?php esc_html_e('Nada encontrado', 'default_theme'); ?></h1>
                            <p class="text-center"><?php esc_html_e('Nada corresponde aos seus termos de pesquisa. Por favor, tente novamente com algumas palavras-chave diferentes.', 'default_theme'); ?></p>
                            <form class="relative mt-4 max-w-[414px] mx-auto" method="get" action="/">
                                <input name='s' class="input_default w-full " />
                                <div class="absolute top-1/2 left-full">
                                    <button id="clean_value_btn_desk" class="absolute w-6 h-6 right-[50px] top-0 bottom-0 my-auto z-10 search_inside_form hidden clean_btn" type="button">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.23077 20L4 18.7692L10.7692 12L4 5.23077L5.23077 4L12 10.7692L18.7692 4L20 5.23077L13.2308 12L20 18.7692L18.7692 20L12 13.2308L5.23077 20Z" fill="#484848" />
                                        </svg>
                                    </button>
                                    <button class="absolute w-6 h-6 right-10 top-0 bottom-0 my-auto" type="submit">
                                        <svg class="ml-5 mr-5  lg:block w-6 h-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#484848" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M21 20.9999L16.65 16.6499" stroke="#484848" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="text-center mt-[51px] flex flex-col items-center lg:mt-[45px] lg:block">
                            <span><?php echo esc_html_e('Ou se preferir, explore o nosso website', 'default_theme'); ?></span>
                            <?php get_template_part('template-parts/components/cv-link', 'button', array(
                                'props' => array_merge([
                                    'title' => __('Voltar para homepage', 'default_theme'),
                                    'url' => '/'
                                ], ['elementClass' => 'primary_btn w-full secondary mt-5 lg:max-w-[344px] lg:p-0 lg:mx-auto'])
                            )); ?>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
?>
<img class="absolute -z-10 bg-no-repeat lg:hidden" src="<?php echo get_template_directory_uri() . '/assets/img/bg-404.svg'; ?>" />
<img class="fixed top-[143px] -right-[640px] scale-150 -z-10 bg-no-repeat hidden lg:block" src="<?php echo get_template_directory_uri() . '/assets/img/bg-404-desktop.svg'; ?>" />
 