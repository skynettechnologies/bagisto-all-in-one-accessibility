# All in One Accessibility™: Bagisto Extension

All in One Accessibility AI free Widget Supports limited 23 features only and includes 140 Languages. 
   
It improves website ADA compliance and browser experience for ADA, WCAG 2.0, 2.1 & 2.2, Section 508, California Unruh Act, Australian DDA, European EAA EN 301 549, UK Equality Act (EA), Israeli Standard 5568, Ontario AODA, Canada ACA, German BITV, France RGAA, Brazilian Inclusion Law (LBI 13.146/2015), Spain UNE 139803:2012, JIS X 8341 (Japan), Italian Stanca Act and Switzerland DDA Standards.
   
Follows the best industry security, SEO practices and standards ISO 9001:2015 & ISO 27001:2013 and complies with GDPR, COPPA regulations. Member of W3C and International Association of Accessibility Professionals (IAAP). It is a flexible & lightweight widget that can be changed according to law and reduces the risk of time-consuming accessibility lawsuits.

For more details/features, Please visit [All in One Accessibility](https://www.skynettechnologies.com/all-in-one-accessibility)

Unlock over 70 features with the All in One Accessibility Widget through a paid subscription. See the detailed comparison of Paid vs. Free features [here](https://www.skynettechnologies.com/all-in-one-accessibility/features).

We provide a 10-day free trial. Get started [here](https://ada.skynettechnologies.us/trial-subscription?utm_source=all-in-one-accessibility&utm_medium=landing-page&utm_campaign=trial-subscription).


## Installation

### Prerequisites
- Bagisto version ^2.2
- Supported Bagisto 1.0 to 2.2 versions

### Steps

**Step 1:** Run the following command from your project root:

```bash
composer require skynettechnologies/bagisto-all-in-one-accessibility
```

**Step 2:** Add package's namespace to the psr-4 section in the ```composer.json``` file located in the root directory of your Bagisto application. Update it as follows:

```json
"autoload": {
"psr-4": {    
        "SkynetTechnologies\\AllinOneAccessibility\\": "packages/SkynetTechnologies/AllinOneAccessibility/src"
    }
}
```

**Step 3:** Register package's service provider in the ```config/app.php``` file located in the root directory of your Bagisto application. Add the following line to the providers array:

```php
<?php

return [
    
    // Other configuration options

    'providers' => ServiceProvider::defaultProviders()->merge([
        // Other service providers
        
        SkynetTechnologies\AllinOneAccessibility\Providers\AllinOneAccessibilityServiceProvider::class,

    ])->toArray(),
    
    // Other configuration options
];
```

**Step 4:** Run the following commands:
```
composer dump-autoload
php artisan optimize:clear
```

**Step 5:** Publish assets for All in One Accessibility extension by running the below command:
```
php artisan vendor:publish --tag=public --force
```

## Configurations

You can configure All in One Accessibility via Admin:

```
Admin > Settings > All in One Accessibility
```

## Live Demo
https://Bagisto.skynettechnologies.us/

## Screenshots

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot-1-free.jpg?v=2)

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot-2-free.jpg?v=2)

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot-3-free.jpg?v=2)

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot-4-free.jpg?v=2)

## Video

[![All in One Accessibility](https://img.youtube.com/vi/I-DjgZyleeI/0.jpg)](https://www.youtube.com/watch?v=I-DjgZyleeI)

## Documentation

- [Purchase Bagisto All in One Accessibility](https://www.skynettechnologies.com/bagisto-accessibility-widget)
- [How to install All in One Accessibility Addon on Bagisto](https://www.skynettechnologies.com/blog/bagisto-accessibility-menu-widget-installation)
- [All in One Accessibility - Features Guide](https://www.skynettechnologies.com/sites/default/files/accessibility-widget-features-list.pdf)

## Submit a Support Request

Please visit our [support page](https://www.skynettechnologies.com/report-accessibility-problem) and fill out the form. Our team will get back to you as soon as possible.

## Send Us an Email

Alternatively, you can send an email to our support team:
[hello@skynettechnologies.com](mailto:hello@skynettechnologies.com)

## Partnership Opportunities

#### [Agency Partnership](https://www.skynettechnologies.com/agency-partners)

Partner with us as an agency to provide comprehensive accessibility solutions to your clients. Get access to exclusive resources, training, and support to help you implement and manage accessibility features effectively.

#### [Affiliate Partnership](https://www.skynettechnologies.com/affiliate-partner)

Join our affiliate program and earn commissions by promoting All in One Accessibility™. Share our Widget with your network and help businesses improve their website accessibility while generating revenue.

For more details, Please visit [Partnership Opportunities Page](https://www.skynettechnologies.com/partner-program)

## Credits

This addon is developed and maintained by [Skynet Technologies USA LLC](https://www.skynettechnologies.com)

## Current Maintainers
- [Skynet Technologies USA LLC](https://github.com/skynettechnologies)
