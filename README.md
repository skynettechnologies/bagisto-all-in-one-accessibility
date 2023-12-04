# bagisto-all-in-one-accessibility


[All in One Accessibility](https://www.skynettechnologies.com/all-in-one-accessibility) extension improves Bagisto website ADA compliance and browser experience for ADA, WCAG 2.1, 2.2, Section 508, Australian DDA, European EAA EN 301 549, UK Equality Act (EA), Israeli Standard 5568, California Unruh, Ontario AODA, Canada ACA, German BITV, and France RGAA Standards.

It uses the accessibility interface which handles UI and design related adjustments. All in One Accessibility app enhances your Bagisto website accessibility to people with hearing or vision impairments, motor impaired, color blind, dyslexia, cognitive & learning impairments, seizure and epileptic, and ADHD problems.

## Features
#### Skip Links
- Skip to Menu
- Skip to Footer
- Skip to Navigation
- Open Accessibility Toolbar

#### Content Adjustments
- Content Scaling
- Readable Fonts
- Highlight Title
- Highlight Links
- Text Magnifier
- Adjust Font Sizing
- Adjust Line Height
- Adjust Letter Spacing
- Align Center
- Align Left
- Align Right

#### Color and Contrast Adjustments
- High Contrast

#### Orientation Adjustments
- Hide Images (Text Only)
- Miscellaneous
- Accessibility Statement
- Dynamic Application Color
- Choose Application Trigger Button Position
- Choose Application Position
- Multi Language

#### Supports 40+ languages
- English
- Spanish
- German
- Arabic
- Slovak
- Portuguese
- French
- Italian
- Polish
- Turkish
- Japanese
- Finnish
- Russian
- Hungarian
- Latin
- Greek
- Hebrew
- Bulgarian
- Catalan
- Chinese
- Czech
- Danish
- Dutch
- Hindi
- Indonesian
- Korean
- Lithuanian
- Malay
- Norwegian
- Romanian
- Slovenian
- Swedish
- Thai
- Ukrainian
- Vietnamese
- Bengali
- Sinhala
- Amharic
- Hmong
- Myanmar (Burmese)

## Installation


```bash
composer require skynettechnologies/bagisto-all-in-one-accessibility
```


## Setup

Add package's namespace to the psr-4 section in the ```composer.json``` file located in the root directory of your Bagisto application. Update it as follows:

```json
"autoload": {
    ...
    "psr-4": {
        // Other PSR-4 namespaces
        "SkynetTechnologies\\AllinOneAccessibility\\": "packages/SkynetTechnologies/AllinOneAccessibility/src"
    }
}
```

Register package's service provider in the ```config/app.php``` file located in the root directory of your Bagisto application. Add the following line to the providers array:

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
Run the following commands:
```
composer dump-autoload
php artisan optimize:clear
```

Publish assets for All in One Accessibility extension by running the below command:
```
php artisan vendor:publish --tag=public --force
```

Run the following command to create the tables in your database for All in One Accessibility extension:
```
php artisan migrate
```

## Configurations

You can configure All in One Accessibility via Admin:

```
Admin > Settings > All in One Accessibility
```

## Support
For any kind of queries/support please Email us at [Skynet Technologies Support](mailto:hello@skynettechnologies.com)


## Documentation

[All in One Accessibility - User Guide](https://www.dropbox.com/s/de41n4xm9zjwxix/All-in-One-Accessibility-PRO-App-Usage-and-Functionality.pdf?dl=0)


## Screenshots

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot3.png)

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot1.png)

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot2.png)

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot4.png)

## Video

[![All in One Accessibility](https://img.youtube.com/vi/czwC0PKIqkc/0.jpg)](https://www.youtube.com/watch?v=czwC0PKIqkc)
