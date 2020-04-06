<?php

// Error reporting
error_reporting(0);
ini_set('display_errors', '0');

// Timezone
date_default_timezone_set('Europe/Berlin');

// env
$settings['env'] = 'prod';

// Error Handling Middleware settings
$settings['error_handler_middleware']['display_error_details'] = false;
$settings['error_handler_middleware']['log_errors'] = true;
$settings['error_handler_middleware']['log_error_details'] = false;

// Database
$settings['db']['host'] = 'my-project-db:2106';
$settings['db']['database'] = 'my-project';
$settings['db']['username'] = '';
$settings['db']['password'] = '';

return $settings;