<?php

namespace NotificationChannels\TurboSms;

use Illuminate\Support\ServiceProvider;

class TurboSmsServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(TurboSmsApi::class, function ($app) {
            $apiToken = $this->app['config']['services.turbosms.api_token'];
            $sender = $this->app['config']['services.turbosms.sender'];
      
            $client = new TurboSmsApi($apiToken, $sender, $this->app['config']['services.turbosms']);
            
            return $client;
        });
    }

    public function provides(): array
    {
        return [
            TurboSmsApi::class,
        ];
    }
}
