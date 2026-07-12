import { cp, mkdir, rm } from 'node:fs/promises';
import path from 'node:path';

const projectRoot = process.cwd();
const publicDirectory = path.join(projectRoot, 'public');
const outputDirectory = path.join(projectRoot, 'dist');

try {
    // Remove the previous deployment output.
    await rm(outputDirectory, {
        recursive: true,
        force: true,
    });

    // Create a fresh dist directory.
    await mkdir(outputDirectory, {
        recursive: true,
    });

    // Copy Laravel's public files, including the Vite build.
    await cp(publicDirectory, outputDirectory, {
        recursive: true,
        force: true,
    });

    // Do not publish Laravel's public/index.php as a static file.
    await rm(path.join(outputDirectory, 'index.php'), {
        force: true,
    });

    console.log('Vercel static files prepared successfully in dist/');
} catch (error) {
    console.error('Failed to prepare Vercel output:', error);
    process.exit(1);
}
