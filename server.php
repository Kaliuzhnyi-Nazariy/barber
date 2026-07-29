<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

if (isset($_SERVER['PATH_INFO']) && !isset($_SERVER['REQUEST_URI'])) {
    $_SERVER['REQUEST_URI'] = $_SERVER['PATH_INFO'];
}
if (isset($_SERVER['REQUEST_URI'])) {
    $cleanUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $_SERVER['SCRIPT_NAME'] = '/index.php';
    $_SERVER['PHP_SELF'] = '/index.php' . $cleanUri;
}

require_once __DIR__.'/public/index.php';
