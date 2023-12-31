# All in One Accessibility: Bagisto Extension

[All in One Accessibility](https://www.skynettechnologies.com/all-in-one-accessibility) extension improves Bagisto website ADA compliance and browser experience for ADA, WCAG 2.1 & 2.2, Section 508, Australian DDA, European EAA EN 301 549, UK Equality Act (EA), Israeli Standard 5568, California Unruh, Ontario AODA, Canada ACA, German BITV, France RGAA, Brazilian Inclusion Law (LBI 13.146/2015), Spain UNE 139803:2012, JIS X 8341 (Japan), Italian Stanca Act and Switzerland DDA Standards.

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

#### Supports 65 languages
- English
- Italian
- French
- German
- Russian
- Spanish
- Finnish
- Portuguese
- Arab
- Polish
- Hungarian
- Slovak
- Japanese
- Turkish
- Greek
- Latin
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
- Malay
- Norwegian
- Romanian
- Slovenian
- Swedish
- Thai
- Ukrainian
- Vietnamese
- Bengali
- Lithuanian
- Sinhala
- Amharic
- Hmong
- Burmese
- Latvian
- Estonian
- Serbian
- Portuguese (Brazil)
- Chinese Traditional
- Croatian
- Georgian
- Hawaiian
- Welsh
- Cebuano
- Samoan
- Haitian Creole
- Faroese
- Montenegrin
- Australian
- Azeri
- Basque
- Canada
- Filipino
- Galician
- Norwegian
- Persian
- Punjabi
- Spanish (Mexico)
- United Kingdom


## Installation


```bash
composer require skynettechnologies/bagisto-all-in-one-accessibility
```


## Setup

Add package's namespace to the psr-4 section in the ```composer.json``` file located in the root directory of your Bagisto application. Update it as follows:

```json
"autoload": {
"psr-4": {    
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

## Configurations

You can configure All in One Accessibility via Admin:

```
Admin > Settings > All in One Accessibility
```

## Screenshots

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot3.png)

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot1.png)

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot2.png)

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot4.png)

## Video

[![All in One Accessibility](https://img.youtube.com/vi/czwC0PKIqkc/0.jpg)](https://www.youtube.com/watch?v=czwC0PKIqkc)

## Acknowledgements

 - [Bagisto All in One Accessibility](https://www.skynettechnologies.com/bagisto-accessibility-widget)
 - [Bagisto All in One Accessibility Extension installation steps blog](https://www.skynettechnologies.com/blog/bagisto-accessibility-menu-widget-installation)

## Documentation

[All in One Accessibility - User Guide](https://www.dropbox.com/s/de41n4xm9zjwxix/All-in-One-Accessibility-PRO-App-Usage-and-Functionality.pdf?dl=0)

## Support
For any kind of queries/support please Email us at [Skynet Technologies Support](mailto:hello@skynettechnologies.com)
