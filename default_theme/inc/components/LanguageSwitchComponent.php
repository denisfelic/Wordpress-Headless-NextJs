<?php

namespace App\components;

class LanguageSwitchComponent
{

    static function render($version = 'v1')
    {

        if (!get_the_ID()) {
          //  self::renderSimpleVersion();

            return;
        }
        $current_language_details = apply_filters('wpml_post_language_details',  [],  get_the_ID());
        $current_language_name = isset($current_language_details['display_name'])
            ? $current_language_details['display_name'] : false;

        if (!$current_language_name) {
           // self::renderSimpleVersion();
            return;
        }

        if ($version == 'v1') {
            self::renderV1($current_language_name);
        } else {
            self::renderV2($current_language_name);
        }
    }

    static function renderV1($current_language_name)
    {
        $input_id = "toggleSwitchDropDown-" . uniqid();

?>
        <div class="custom-language-switch-container flex flex-col">
            <input data-js="toggle-switch-input-header" id="<?php echo $input_id; ?>" class="peer/draft h-3" hidden type="checkbox">
            <label class="w-14 flex items-center gap-2 cursor-pointer mr-[-3px]" for="<?php echo $input_id; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#E67E22" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2 12H22" stroke="#E67E22" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22C9.49872 19.2616 8.07725 15.708 8 12C8.07725 8.29203 9.49872 4.73835 12 2V2Z" stroke="#E67E22" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="text-secondary pt-1" aria-label="<?php echo $current_language_name; ?>"><?php echo $current_language_name; ?></span>
            </label>
            <div class="w-[70px] absolute top-[30px] max-h-0 p-0  overflow-hidden bg-white rounded-b-2xl peer-checked/draft:p-4  peer-checked/draft:max-h-[unset]">
                <?php echo do_shortcode('[wpml_language_switcher  ][/wpml_language_switcher]'); ?>
            </div>


        </div>

    <?php
    }

    static function renderV2($current_language_name)
    {
        $input_id = "toggleSwitchDropDown-" . uniqid();

    ?>
        <div class="custom-language-switch-container cv-v2 flex flex-col">
            <input data-js="toggle-switch-input-menu" id="<?php echo $input_id; ?>" class="peer/draft h-3" hidden type="checkbox">
            <label class="w-14 flex items-center gap-2 cursor-pointer" for="<?php echo $input_id; ?>">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/globe-icon-white.svg'; ?> " alt="<?php echo __('globe icon', 'cata-verde'); ?>">
                <span class="text-white pt-1" aria-label="<?php echo $current_language_name; ?>"><?php echo $current_language_name; ?></span>
            </label>
            <div class="w-10 absolute left-6 pt-0 top-[30px] max-h-0 p-0  overflow-hidden rounded-b-2xl peer-checked/draft:p-4 peer-checked/draft:pt-0  peer-checked/draft:max-h-[unset]">
                <?php echo do_shortcode('[wpml_language_switcher  ][/wpml_language_switcher]'); ?>
            </div>


        </div>

    <?php
    }

    static function renderSimpleVersion()
    {
    ?>
        <div class="custom-language-switch-container.v3 flex flex-col">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#E67E22" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M2 12H22" stroke="#E67E22" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22C9.49872 19.2616 8.07725 15.708 8 12C8.07725 8.29203 9.49872 4.73835 12 2V2Z" stroke="#E67E22" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <div class="w-[70px] absolute top-[30px] max-h-0 p-0  overflow-hidden bg-white rounded-b-2xl peer-checked/draft:p-4  peer-checked/draft:max-h-[unset]">
                <?php echo do_shortcode('[wpml_language_switcher  ][/wpml_language_switcher]'); ?>
            </div>


        </div>
<?php
    }
}
