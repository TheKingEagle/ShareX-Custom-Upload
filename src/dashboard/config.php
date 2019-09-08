<?php

return [
    /* This is a secure key that only you should know, an added layer of security for the image upload */
    'secure_key' => '256bitkeyencryptionforthelolz420',

    /* This is the url your output will be, usually http://www.domain.com/u/, also going to this url will be the gallery page */
    'output_url' => 'http://example.com/',

    /* This request url, so the path pointing to the uplaod.php file */
    'request_url' => 'http://example.com/dashboard/upload.php',

    /* This is a redirect url if the script is accessed directly */
    'redirect_url' => 'https://example.com/',

    /* This is a list of IPs that can access the gallery page (Leave empty for universal access) */
    'allowed_ips' => ['::1','127.0.0.1'],

    /* Page title of the gallery page */
    'page_title' => "your own Gallery",

    /* Heading text at the top of the gallery page */
    'heading_text' => "your own Gallery",

    /* Delete file option (true to enable, disabled by default) */
    'enable_delete' => true,

    /* Show image in tooltip  (true to enable, disabled by default) */
    'enable_tooltip' => true,

    /* Show link to download all files as .zip (Untested with large archives of files) */
    'enable_zip_dump' => false,

    /* Generate random name (true to enable, disabled by default) */
    'enable_random_name' => true,

    /* Select lenght of random name (10 symbols by default) */
    'random_name_length' => 10,
];
