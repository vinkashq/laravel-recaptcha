# Laravel Recaptcha Validator
Google reCAPTCHA Validator Package for Laravel Framework

## Usage

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
