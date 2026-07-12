<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Tell Laravel the original Vercel request is HTTPS
|--------------------------------------------------------------------------
*/

$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = '443';
$_SERVER['REQUEST_SCHEME'] = 'https';
$_SERVER['HTTP_X_FORWARDED_PROTO'] = 'https';

if (! is_dir('/tmp/views')) {
    mkdir('/tmp/views', 0775, true);
}

require __DIR__.'/../public/index.php';
