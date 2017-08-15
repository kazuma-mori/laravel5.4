<?php
define('REQUEST_DATETIME', date('Y-m-d H:i:s'));
define('REQUEST_DATE',     date('Y-m-d', strtotime(REQUEST_DATETIME)));
define('ROOT_DIR',         $_SERVER['DOCUMENT_ROOT']);
define('DISABLED', 0);
define('ENABLED',  1);
define('ADMIN_URL_PREFIX', 'admin');
define('PROJECT_NAME',     'PROJECT');