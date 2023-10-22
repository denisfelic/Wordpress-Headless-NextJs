<?php

/**
 * LOGIN screen
 */

function admin_area_logo()
{
    echo '
    <style type="text/css">
    body.login div#login h1 a {
        background-image: url(' .  get_template_directory_uri() . '/assets/img/admin-logo.png);
        padding-bottom: 10px;
        background-size: contain;
        margin: 0 auto 0;
        height: 80px;
        width: 200px;
    }
</style>
';
}
add_action('login_enqueue_scripts', 'admin_area_logo');


function website_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'website_logo_url');
