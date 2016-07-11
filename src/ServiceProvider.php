<?php

namespace Vinkas\Laravel\Recaptcha;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {
  /**
  * Perform post-registration booting of services.
  *
  * @return void
  */
  public function boot()
  {

    $this->publishes([
      __DIR__.'/config/recaptcha.php' => config_path('recaptcha.php'),
    ], 'config');

    $this->app->validator->extend('recaptcha', function($attribute, $value, $parameters, $validator) {
      $secret = config('recaptcha.secret');
      $recaptcha = new \ReCaptcha\ReCaptcha($secret);
      $remoteIp = app('request')->getClientIp();
      $response = $recaptcha->verify($value, $remoteIp);
      return $resp->isSuccess();
    });
  }

  /**
  * Register any package services.
  *
  * @return void
  */
  public function register()
  {
    //
  }
}
