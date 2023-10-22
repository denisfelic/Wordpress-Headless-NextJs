<?php
// Setup
require_once('setup/class-tgm-plugin-activation.php');
require_once('setup/required-plugins.php');
require_once('helpers/functions.php');

//  Admin
require_once('admin/theme-admin.php');
require_once('admin/images.php');

/* Blocks */
require_once('blocks/blocks-setup.php');

/* custom widget area */
require_once('custom-widgets-areas.php');
require_once('acf-config.php');


/* Features*/
require_once('helpers/breadcrumbs.php');

require_once 'custom-theme-colors.php';

/** Estimate reading time  */
require_once 'helpers/reading-time.php';

/* custom header */
require_once 'helpers/custom-headers.php';

/* options page */
require_once  'options-page/options-setup.php';

/* custom Post-Type */

require_once('cpt/faqs-post-type.php');


require_once('config/register-custom-menus.php');

require_once('config/register-mime-types.php');
