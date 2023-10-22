<?php

function my_custom_mime_types($mimes)
{
    // New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';

    $mimes['svgz'] = 'image/svg+xml';

    $mimes['pdf'] = 'application/pdf';

    return $mimes;
}
add_filter('upload_mimes', 'my_custom_mime_types');
