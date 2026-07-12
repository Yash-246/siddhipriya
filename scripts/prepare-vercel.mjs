import { cp, mkdir, readdir, rm } from 'node:fs/promises';
import path from 'node:path';

const projectRoot = process.cwd();
const publicDirectory = path.join(projectRoot, 'public');
const outputDirectory = path.join(projectRoot, 'dist');

async function removeUnsafeFiles(directory) {
    const entries = await readdir(directory, {
        withFileTypes: true,
    });

    for (const entry of entries) {
        const fullPath = path.join(directory, entry.name);

        if (entry.isDirectory()) {
            await removeUnsafeFiles(fullPath);
            continue;
        }

        const shouldRemove =
            entry.name.toLowerCase().endsWith('.php') ||
            entry.name === '.htaccess';

        if (shouldRemove) {
            await rm(fullPath, {
                force: true,
            });
        }
    }
}

try {
    await rm(outputDirectory, {
        recursive: true,
        force: true,
    });

    await mkdir(outputDirectory, {
        recursive: true,
    });

    await cp(publicDirectory, outputDirectory, {
        recursive: true,
        force: true,
    });

    await removeUnsafeFiles(outputDirectory);

    console.log('Vercel static files prepared successfully in dist/');
} catch (error) {
    console.error('Failed to prepare Vercel output:', error);
    process.exit(1);
}
