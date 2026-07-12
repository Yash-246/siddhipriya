# Siddhipriya Gracia Laravel Website

Premium Laravel 11 real-estate builder website for **Siddhipriya Gracia**, built with:

- Responsive 3D-style frontend inspired by premium project/architecture sites.
- Light/dark theme toggle with light theme active by default.
- Backend admin panel for projects, settings, and inquiries.
- SEO meta, canonical tags, OG tags, sitemap, robots.txt and JSON-LD ApartmentComplex schema.
- Inquiry form with validation, CSRF, throttle middleware and honeypot field.
- Security headers middleware and admin noindex protection.
- Original SVG visuals. No copied listing images are used.

## Important accuracy note

Public listings use slightly different developer naming: some sources mention **Siddhipriya Reality**, while another listing mentions **Siddhi Priya Infraspace**. I used **Siddhipriya Group** in editable seed content to avoid publishing the wrong legal entity. Before live launch, replace it with the exact legal developer name from the official brochure/RERA record.

## Verified content used

Seeded content includes:

- Address: 23, Greencity, Vrajshyam Co-Society, Bopal-Ghuma Road, Ahmedabad, Gujarat 380058.
- Plus Code: 2CFW+2R Ahmedabad, Gujarat.
- Configuration: 2 & 3 BHK apartments.
- Project area: 2.36 acres.
- Project size: 9 buildings / 510 units.
- Floors: 14 floors per building.
- Possession reference: December 2028.
- Launch reference: March 2023.
- RERA ID: PR/GJ/AHMEDABAD/DASKROI/Ahmedabad Municipal Corporation/MAA13809/080724/311228.
- Indicative price references from public listings.
- Amenities: clubhouse, gymnasium, swimming pool, 24x7 security, CCTV, water supply, lifts and intercom.

## Installation

```bash
cd siddhipriya-gracia-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

Admin:

```text
http://127.0.0.1:8000/admin/login
```

Default admin credentials are read from `.env`:

```text
ADMIN_EMAIL=admin@siddhipriyagracia.com
ADMIN_PASSWORD=ChangeThis@12345
```

Change them before production.

## Production hardening checklist

This project adds the right foundation, but do not fool yourself: no frontend code can be made impossible to copy. Anyone can still screenshot, inspect, or recreate visuals. Real protection is server-side and legal/operational.

Before launch:

1. Set `APP_ENV=production` and `APP_DEBUG=false`.
2. Use HTTPS and force HTTPS at server level.
3. Change admin credentials and use a strong password.
4. Restrict `/admin` by IP if the client allows it.
5. Add daily database backup.
6. Replace placeholder phone/email with real sales contact.
7. Replace SVG concept visuals with approved official photos/renders.
8. Verify RERA/developer legal text before publishing.
9. Run `php artisan optimize` after deployment.
10. Configure mail driver so inquiries can be emailed to sales team.

## Folder highlights

```text
app/Http/Controllers/Frontend   Public pages and inquiry controller
app/Http/Controllers/Admin      Admin dashboard/controllers
app/Http/Middleware             Admin auth + security headers
app/Models                      Project, Amenity, Inquiry, Settings models
database/migrations             Full database structure
database/seeders                Ready project content
resources/views/frontend        Public Blade pages
resources/views/admin           Admin Blade pages
public/assets/css/front.css     Main responsive 3D-style UI
public/assets/js/front.js       Theme toggle, menu, tilt effects
public/assets/img               Original vector visuals
```
