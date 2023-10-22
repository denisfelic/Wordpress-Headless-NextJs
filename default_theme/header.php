<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Default_Theme
 */

use App\components\LanguageSwitchComponent;

?>
<!doctype html>
<html <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head();?>
</head>

<body <?php body_class();?>>
    <script>
        function showHiddenSearchMobile() {
            document.querySelector(".mobile_content_search").classList.toggle("hidden")
            document.querySelector(".hidden-search").classList.toggle("hidden");
            document.querySelector(".custom-logo-link-container").classList.toggle("hidden");

            // Hide oppend switch language list
            $('[data-js="toggle-switch-input-header"]').prop('checked', false)
        };

        function showHiddenSearch(el) {
            const search = document.getElementById('search_s_desktop')
            const searchMobile = document.getElementById('search_s_mobile')
            if (window.innerWidth < 1024) {
                if (search.value === "") {
                    return showHiddenSearchMobile()
                } else {
                    search.parentNode.submit()
                }
            } else {
                if (search.value === "") {
                    document.querySelector(".hidden-search-desktop").classList.toggle("hidden");
                    document.querySelector(".search-icon").classList.toggle("lg:block")
                } else {
                    search.parentNode.submit()
                }
                // document.querySelector('.search_inside_form').classList.toggle('hidden')
            }
        }

        function cleanInputValue() {
            const searchMobile = document.getElementById('search_s_mobile')
            const searchDesktop = document.getElementById('search_s_desktop')
            searchDesktop.value = ""
            searchMobile.value = ""
        }

        function verifyValue(el) {
            el.value === "" ? el.parentNode.children[1].classList.add("hidden") : el.parentNode.children[1].classList.remove("hidden")
        }
    </script>
    <?php wp_body_open();?>
    <div id="page" class="site flex flex-col justify-between h-full min-h-screen">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e('Skip to content', 'default_theme');?></a>
        <header id="masthead" class="site-header absolute w-full z-20">
            <div class="px-1 lg:px2">
                <nav class="flex justify-between bg-white grid-base rounded-[100px]
                            px-2 pr-5  h-[72px] mx-auto mt-2 lg:pr-6 relative"
                            aria-label="<?php echo _("header nav", 'default_theme') ?>"
                            >
                    <div class="mobile_content_search hidden absolute w-full h-full
                             bg-white left-0 rounded-[32px] z-10 flex items-center px-2 pr-4">
                        <button onclick="showHiddenSearchMobile()"
                         class=" bg-grey-light w-[56px] h-[56px] rounded-full flex justify-center items-center mr-4">
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 1L1 7L7 13" stroke="#484848" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" />
                            </svg>
                        </button>

                        <form id="form_default_header" class="relative flex-1 " method="get" action="/">
                            <input onchange="verifyValue(this)" id="search_s_desktop" name='s' class="input_default w-full" />
                            <button id="clean_value_btn" class="absolute w-6 h-6 right-[50px] top-0 bottom-0 my-auto z-10 search_inside_form hidden" onclick="cleanInputValue()" type="button">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.23077 20L4 18.7692L10.7692 12L4 5.23077L5.23077 4L12 10.7692L18.7692 4L20 5.23077L13.2308 12L20 18.7692L18.7692 20L12 13.2308L5.23077 20Z" fill="#484848" />
                                </svg>
                            </button>
                            <button class="absolute w-6 h-6 right-10 top-0 bottom-0 my-auto z-10 search_inside_form" onclick="showHiddenSearch(this)" type="button">
                                <svg class="ml-5 mr-5 w-6 h-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#484848" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M21 20.9999L16.65 16.6499" stroke="#484848" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div class="flex items-center">
                        <button onclick="sidebar.openSidebar()" class="px-3 py-4 border rounded-full hover:text-white bg-primary w-[56px] h-[56px] grid place-content-center">
                            <svg fill="white" class="h-[16px] w-[24px]" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 flex justify-center  w-full items-center lg:items-start absolute max-w-[200px] mx-auto left-0 right-0">
                        <div class="mt-[6px] custom-logo-link-container w-16 lg:hidden"> <?php echo get_custom_logo($blog_id = 0); ?></div>
                        <div class="hidden ml-[16px] mt-[6px] w-16 lg:block lg:-ml-[10px]"> <?php echo get_custom_logo($blog_id = 0); ?></div>
                        <div class="lg:hidden">
                            <div class="hidden-search hidden my-auto">
                                <form class="relative" method="get" action="/">
                                    <input onchange="verifyValue(this)" name='s' class="input_default" />
                                    <button id="clean_value_btn_desk" class="absolute w-6 h-6 right-[50px] top-0 bottom-0 my-auto z-10 search_inside_form hidden clean_btn" onclick="cleanInputValue()" type="button">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.23077 20L4 18.7692L10.7692 12L4 5.23077L5.23077 4L12 10.7692L18.7692 4L20 5.23077L13.2308 12L20 18.7692L18.7692 20L12 13.2308L5.23077 20Z" fill="#484848" />
                                        </svg>
                                    </button>
                                    <button class="absolute w-6 h-6 right-10 top-0 bottom-0 my-auto" onclick="showHiddenSearch(this)" type="submit">
                                        <svg class="ml-5 mr-5 hidden lg:block w-6 h-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#484848" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M21 20.9999L16.65 16.6499" stroke="#484848" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="flex items-center justify-end gap-[15px]">

                        <div class="form-header flex items-center">
                            <div class="hidden lg:block">
                                <span class="hidden-search-desktop hidden">
                                    <form class="relative" method="get" action="/">
                                        <input onchange="verifyValue(this)" id="search_s_mobile" name='s' class="input_default" />
                                        <button id="clean_value_btn" class="absolute w-6 h-6 right-[50px] top-0 bottom-0 my-auto z-10 search_inside_form hidden clean_btn" onclick="cleanInputValue()" type="button">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.23077 20L4 18.7692L10.7692 12L4 5.23077L5.23077 4L12 10.7692L18.7692 4L20 5.23077L13.2308 12L20 18.7692L18.7692 20L12 13.2308L5.23077 20Z" fill="#484848" />
                                            </svg>
                                        </button>
                                        <button class="absolute w-6 h-6 right-10 top-0 bottom-0 my-auto z-10 search_inside_form" onclick="showHiddenSearch()" type="button">
                                            <svg class="ml-5 mr-5 hidden lg:block w-6 h-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#484848" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M21 20.9999L16.65 16.6499" stroke="#484848" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </form>

                                </span>
                            </div>

                            <button class="lg:hidden" onclick="showHiddenSearchMobile()" type="submit">
                                <svg class="ml-5 mr-5" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#484848" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M21 20.9999L16.65 16.6499" stroke="#484848" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <button class="" onclick="showHiddenSearch()" type="submit">
                                <svg class="ml-5 mr-5 hidden lg:block search-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#484848" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M21 20.9999L16.65 16.6499" stroke="#484848" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>

                        </div>
                        <?php
LanguageSwitchComponent::render();
?>

                    </div>
                </nav>

            </div><!-- .site-branding -->

            <div style="transform: translateX(-100%)" id="sidebar" class="sidebar fixed top-0 w-full h-full z-[10] bg-primary transition-all duration-700">
                <img width="2220" height="1000" class="absolute w-[2228px] h-full object-cover" alt="logo green" src="<?php echo get_template_directory_uri() . '/assets/img/logo-bg.svg'; ?>" />
                <div class="grid-base z-10 relative">
                    <div class="flex justify-between items-center w-full grid-base h-fit pt-4 lg:pt-4 pl-0 ">
                        <button onclick="sidebar.openSidebar()" onclick="" class="">
                            <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="28" cy="28" r="28" fill="#E63137" />
                                <path d="M20.2999 37.0999L18.8999 35.6999L26.5999 27.9999L18.8999 20.2999L20.2999 18.8999L27.9999 26.5999L35.6999 18.8999L37.0999 20.2999L29.3999 27.9999L37.0999 35.6999L35.6999 37.0999L27.9999 29.3999L20.2999 37.0999Z" fill="white" />
                            </svg>
                        </button>

                        <div>
                            <?php
LanguageSwitchComponent::render('v2');
?>
                        </div>
                    </div>
                    <nav id="site-navigation" class="main-navigation flex-1">
                        <?php
wp_nav_menu(array(
    'theme_location' => 'header_menu',
));
?>
                    </nav><!-- #site-navigation -->
                </div>

            </div>
        </header><!-- #masthead -->