# Laravel Recaptcha Validator
[![Latest Stable Version](https://poser.pugx.org/vinkas/laravel-recaptcha/v/stable.svg)](https://packagist.org/packages/vinkas/laravel-recaptcha)
[![Latest Unstable Version](https://poser.pugx.org/vinkas/laravel-recaptcha/v/unstable.svg)](https://packagist.org/packages/vinkas/laravel-recaptcha)
[![License](https://poser.pugx.org/vinkas/laravel-recaptcha/license.svg)](https://packagist.org/packages/vinkas/laravel-recaptcha)

#### Google reCAPTCHA Validator Package for Laravel Framework

## Installation

#### Via Composer Require

You may install by running the `composer require` command in your terminal:
```
composer require vinkas/laravel-recaptcha
```

## Configuration

----------

**Add Service Provider to your `config/app.php` file**

```
Vinkas\Laravel\Recaptcha\ServiceProvider::class,
```

And run `php artisan` command to publish package config file

```
php artisan vendor:publish --provider="Vinkas\Laravel\Recaptcha\ServiceProvider"
```

**Add your recaptcha site key and secret in `.env` file**

```
RECAPTCHA_SITE_KEY=__________
RECAPTCHA_SECRET=__________
```

**Add recaptcha custom error message in `resources\lang\en\validation.php` file**

```
'recaptcha'            => 'The capcha verfication failed. Please try again.',
```

**Add recaptcha field in your form's blade view**

```
<div class="g-recaptcha" data-sitekey="{{ getenv('RECAPTCHA_SITE_KEY') }}"></div>

@if ($errors->has('g-recaptcha-response'))
  {{ $errors->first('g-recaptcha-response') }}
@endif
```

**Add `Validator` calling function in your app controller file**

```
Validator::make($data, [
  'g-recaptcha-response' => 'required|recaptcha',
]);
```

**It's done! Now your form spam protected by Google reCAPTCHA!!!**

## Dependencies

[Google Recaptcha](https://github.com/google/recaptcha)
