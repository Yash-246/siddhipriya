# Vercel deployment notes

The project is prepared for Laravel on Vercel's serverless runtime.

## Why the previous deployment returned HTTP 500

The build completed successfully, so the failure was happening at request/runtime rather than during Vercel's build. Laravel normally writes compiled Blade templates, file sessions, cache files and logs under `storage/`. A Vercel deployment bundle is read-only at runtime; only `/tmp` is writable. In addition, Laravel requires a stable `APP_KEY` for encrypted cookies/session middleware.

`api/index.php` now:

- sends logs to stderr so they appear in Vercel Logs;
- compiles Blade templates under `/tmp/laravel/views`;
- uses cookie-backed sessions by default;
- uses the array cache by default;
- copies the bundled SQLite DB to `/tmp/laravel/database.sqlite` when no external DB is configured;
- preserves HTTPS/proxy information for URL generation.

## Required Vercel environment variables

In **Vercel -> Project -> Settings -> Environment Variables**, add these for Production (and Preview if you use preview deployments):

```text
APP_ENV=production
APP_DEBUG=false
APP_URL=https://YOUR-REAL-VERCEL-DOMAIN.vercel.app
APP_KEY=base64:YOUR_STABLE_LARAVEL_KEY
LOG_CHANNEL=stderr
SESSION_DRIVER=cookie
SESSION_SECURE_COOKIE=true
CACHE_STORE=array
```

Generate `APP_KEY` locally once:

```bash
php artisan key:generate --show
```

Copy the complete `base64:...` value into Vercel. Do not commit a real production key to GitHub.

## Database

For a quick preview, the application can run with the bundled SQLite file. It is copied to `/tmp` on a function instance so runtime writes do not crash. **That data is ephemeral and is not safe for production inquiries or admin edits.**

For production, configure a persistent MySQL database in Vercel:

```text
DB_CONNECTION=mysql
DB_HOST=...
DB_PORT=3306
DB_DATABASE=...
DB_USERNAME=...
DB_PASSWORD=...
```

Run the migrations/seeder against that persistent database from a trusted machine or deployment workflow before sending live traffic.

## Redeploy

After adding environment variables, redeploy the latest commit. Test these URLs in order:

1. `/up` — Laravel boot/health check.
2. `/` — homepage and database read.
3. `/admin/login` — session/cookie path.
4. Submit a test inquiry — confirms database writes.

If `/up` works but `/` fails, inspect Vercel runtime logs for the database exception. If all GET pages work but form submissions fail, the database is still using the ephemeral/read-only setup or the external DB credentials are wrong.
