<?php

declare(strict_types=1);

// Blade compiled views must use Vercel's writable temporary directory.
if (! is_dir('/tmp/views')) {
    mkdir('/tmp/views', 0775, true);
}

require __DIR__ . '/../public/index.php';