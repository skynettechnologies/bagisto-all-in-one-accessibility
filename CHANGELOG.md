# Changelog

## 2.0.1 (2026-11-23)

Built on the All in One Accessibility settings page update of 16 November 2026.

- Validation messages for a custom widget color, an exact position and an exact icon size: the field turns red and the message shows under it. The exact icon size is now checked under its field too ("Enter an exact icon size from 20 to 150 px.").
- Saving with several invalid fields shows one summary, "Check the fields marked in red", naming every field that needs a fix.
- The "Upgrade to Paid Plan" links (upgrade banner and the locked tabs) now open the trial form with the website, email and name filled in: `website`, `email` (only a valid one), `first_name` and `last_name` from the admin's name.

## 2.0.0 (2026-11-23)

New settings page, built on the All in One Accessibility settings page v26.10.27.

**Settings page (Admin → All in One Accessibility)**

- Three tabs: Appearance Design, Paid Features and Accessibility Score. Paid plans open on Accessibility Score.
- Appearance Design: widget color with presets and a live preview, widget size (Regular or Oversize), a 3 × 3 position grid or an exact position in pixels, 29 icon types, and preset or exact icon sizes.
- Paid Features (paid plans): widget position for mobile, custom accessibility statement and report a problem links, external link navigation and open / close sound switches.
- Accessibility Score (paid plans): score, violations remediated, alt text remediated, web pages scanned, last scan date and the PDF report.
- Free plan: upgrade banner, with the paid tabs locked behind a 10-day free trial card. Paid plan: a Dashboard button that signs in to the Skynet dashboard.
- A store that is not registered yet is registered for the free widget once, on the first visit, with the signed-in admin's name and email and an EU check.
- Its own item in the main admin menu, right below Dashboard, with the All in One Accessibility logo as its icon.
- Follows the Bagisto admin dark mode. No outside scripts, fonts or CSS frameworks are loaded in the admin panel.

**Bagisto 2.5 support**

- Works with Bagisto 2.5 and Laravel 13: the page is a Vue component of the admin app, and its CSS is scoped to the page.
- Both admin routes are in the ACL, so roles with the "All in One Accessibility" permission can use the page. The menu item and the permission share one key.
- Server calls go through an admin-only route with the CSRF token, limited to the store's own domain. TLS certificates are verified on every Skynet call.
- The admin URL prefix follows `APP_ADMIN_URL`.
- New `AIOA_WEBSITE_DOMAIN` setting for admin panels that run on another domain than the store.

**Storefront**

- The widget script reads the saved settings from Skynet and loads the EU or the non-EU widget once per page, from the `bagisto.shop.layout.body.after` event.

**Installation**

- `composer require` is enough: the package now autoloads from its own `src/` folder. Assets are published with `php artisan vendor:publish --tag=allinoneaccessibility-assets --force` to `public/vendor/allinoneaccessibility`.

**Removed**

- The database table is no longer created on every request, and the admin page no longer calls `ipwho.is` or registers the website on every visit.
- The jQuery and Bootstrap CDN files, the Laravel Mix build, the unused data grid, the demo storefront page at `/allinoneaccessibility` and the old store / update routes.
- The `aioa` table stays for existing installs: a license key saved by 1.x is still passed to the widget.

## 1.0.43

Last version for Bagisto 2.4 and older.
