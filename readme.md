<p align="center"><a href="https://naykel.com.au" target="_blank"><img src="https://avatars0.githubusercontent.com/u/32632005?s=460&u=d1df6f6e0bf29668f8a4845271e9be8c9b96ed83&v=4" width="120"></a></p>

<a href="https://packagist.org/packages/naykel/contactit"><img src="https://img.shields.io/packagist/dt/naykel/contactit" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/naykel/contactit"><img src="https://img.shields.io/packagist/v/naykel/contactit" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/naykel/contactit"><img src="https://img.shields.io/packagist/l/naykel/contactit" alt="License"></a>

# Naykel Contactit

Contact form package for Naykel Laravel applications.

- [Installation and Configuration](#installation-and-configuration)
  - [Before you begin](#before-you-begin)
  - [Install the package via composer:](#install-the-package-via-composer)
  - [Publish views (optional)](#publish-views-optional)
  - [Configuration settings](#configuration-settings)
- [Usage](#usage)
  - [Props and attributes](#props-and-attributes)
  - [Views](#views)
- [FAQ's](#faqs)
- [Change log](#change-log)
  
## Installation and Configuration

### Before you begin

- This package requires Google reCAPTCHA for validation. Once installed be sure to add the Google Captcha keys to your `.env` file.
- Routes are loaded from the package (including contact page), there is no need to do anything.

### Install the package via composer:

    composer require naykel/contactit

### Publish views (optional)
  
Publish views for custom layouts.

  php artisan vendor:publish --tag=contactit-views


### Configuration settings

**NOTE:** This package does not have its own configuration file, any config settings are part of the default laravel config or `naykel/gotime` package configuration file.

    RECAPTCHA_SITE_KEY=your_site_key
    RECAPTCHA_SECRET_KEY=your_recapture_secret_key

## Usage

``` html
<x-contactit-contact />

<x-contactit-contact> 
  <p>Add custom content in slot</p>
<x-contactit-contact />
```

### Props and attributes

| ID  | Type | Default | Description |
| --- | ---- | ------- | ----------- |
|     |      |         |             |

### Views

Publish views for custom layouts.

## FAQ's

##### How do I edit mail templates?





## Change log

See the [changelog](changelog.md) for more information on what has changed recently.

[link-author]: https://github.com/naykel76
[link-email]: nathan@naykel.com.au
