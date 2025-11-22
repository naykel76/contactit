<p align="center"><a href="https://naykel.com.au" target="_blank"><img src="https://avatars0.githubusercontent.com/u/32632005?s=460&u=d1df6f6e0bf29668f8a4845271e9be8c9b96ed83&v=4" width="120"></a></p>

<a href="https://packagist.org/packages/naykel/contactit"><img src="https://img.shields.io/packagist/dt/naykel/contactit" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/naykel/contactit"><img src="https://img.shields.io/packagist/v/naykel/contactit" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/naykel/contactit"><img src="https://img.shields.io/packagist/l/naykel/contactit" alt="License"></a>

# Naykel Contactit

Contact form component with reCaptcha for Naykel Laravel applications.

## Installation

To get started, install Contactit using the Composer package manager:

    composer require naykel/contactit

Optionally you can publish views for custom layouts.

    php artisan vendor:publish --tag=contactit-views

## Finishing up and making it work

### Add ReCaptcha keys to .env

    RECAPTCHA_SITE_KEY=your_site_key
    RECAPTCHA_SECRET_KEY=your_recapture_secret_key

<a id="usage"></a>
## Usage

``` html
<livewire:contact />
```
