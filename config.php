<?php
global $wpdb;

// define paths
define ('DVL_BASE_PATH', dirname (__FILE__));
define ('DVL_BASE_WEB_PATH', plugin_dir_url ( __FILE__ ));

// define roles
define ('DVL_POST_TYPE_NAME', 'dvl_video');

// set plugin settings
define ('DVL_BASE_PERMALINK', 'videos');
define ('DVL_ADMIN_LINK_POSITION', 22);

// load support files
require_once (DVL_BASE_PATH . '/classes/dvl-utilities.php');
require_once (DVL_BASE_PATH . '/classes/dvl-plugin-manager.php');
require_once (DVL_BASE_PATH . '/classes/dvl-shortcode-manager.php');
require_once (DVL_BASE_PATH . '/classes/dvl-options-manager.php');
require_once (DVL_BASE_PATH . '/classes/dvl-widget.php');
