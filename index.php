<?php

// the index file
include_once __DIR__ . '/config.php';
include_once __DIR__ . '/functions.php';

$uri = parse_url($_SERVER['REQUEST_URI']);
$uri['path'] = str_replace('/' . $dirname, '', $uri['path']);

if (strlen($uri['path']) > 1) {
    $uri['path'] = substr($uri['path'], 1);
}

$page_to_include = '';

foreach (glob("controllers/*.php") as $filename)
{
    include $filename;
}

if (empty($page_to_include)) {
    http_response_code(404);
    die("Page not found :(");
}

include __DIR__ . '/includes/theme.php';