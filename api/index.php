<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Vercel runtime bootstrap for Laravel
|--------------------------------------------------------------------------
|
| Vercel functions run on a read-only deployment filesystem. Laravel's
| defaults try to write compiled Blade views, logs, sessions and (for this
| project) SQLite data inside the project directory. Those writes can cause
| a 500 response even though the build itself succeeds.
|
| The writable filesystem in a Vercel function is /tmp. We therefore move
| transient runtime state there and use stderr for application logs.
|
*/

$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = '443';
$_SERVER['REQUEST_SCHEME'] = 'https';
$_SERVER['HTTP_X_FORWARDED_PROTO'] = 'https';

$setDefaultEnv = static function (string $name, string $value): void {
    $current = getenv($name);

    if ($current === false || $current === '') {
        putenv($name.'='.$value);
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
};

$runtimeDirectories = [
    '/tmp/laravel',
    '/tmp/laravel/views',
    '/tmp/laravel/sessions',
    '/tmp/laravel/cache',
    '/tmp/laravel/storage',
];

foreach ($runtimeDirectories as $directory) {
    if (! is_dir($directory)) {
        mkdir($directory, 0775, true);
    }
}

$setDefaultEnv('APP_ENV', 'production');
$setDefaultEnv('APP_DEBUG', 'false');

if (getenv('APP_URL') === false || getenv('APP_URL') === '') {
    $vercelHost = getenv('VERCEL_PROJECT_PRODUCTION_URL')
        ?: getenv('VERCEL_URL')
        ?: ($_SERVER['HTTP_HOST'] ?? '');

    if ($vercelHost !== '') {
        $setDefaultEnv('APP_URL', 'https://'.ltrim($vercelHost, '/'));
    }
}
$setDefaultEnv('LOG_CHANNEL', 'stderr');
$setDefaultEnv('LOG_STACK', 'stderr');
$setDefaultEnv('CACHE_STORE', 'array');
$setDefaultEnv('SESSION_DRIVER', 'cookie');
$setDefaultEnv('SESSION_SECURE_COOKIE', 'true');
$setDefaultEnv('VIEW_COMPILED_PATH', '/tmp/laravel/views');

/*
|--------------------------------------------------------------------------
| SQLite fallback for zero-config/demo deployments
|--------------------------------------------------------------------------
|
| If no external database is configured, copy the bundled SQLite database
| into /tmp so Laravel can open it read/write. /tmp is ephemeral, therefore
| this fallback is suitable for previews only. Production inquiries/admin
| changes require a persistent external DB (for example MySQL) configured
| through Vercel Environment Variables.
|
*/

$dbConnection = getenv('DB_CONNECTION');
$dbDatabase = getenv('DB_DATABASE');

if ($dbConnection === false || $dbConnection === '') {
    $setDefaultEnv('DB_CONNECTION', 'sqlite');
    $dbConnection = 'sqlite';
}

if ($dbConnection === 'sqlite' && ($dbDatabase === false || $dbDatabase === '')) {
    $sourceDatabase = __DIR__.'/../database/database.sqlite';
    $runtimeDatabase = '/tmp/laravel/database.sqlite';

    if (! file_exists($runtimeDatabase) && file_exists($sourceDatabase)) {
        copy($sourceDatabase, $runtimeDatabase);
    }

    $setDefaultEnv('DB_DATABASE', $runtimeDatabase);
}

/*
| APP_KEY must be stable across requests for encrypted cookies and sessions.
| Do not generate a random key inside a serverless invocation. Configure it
| once in Vercel Environment Variables (APP_KEY=base64:...).
*/

require __DIR__.'/../public/index.php';
