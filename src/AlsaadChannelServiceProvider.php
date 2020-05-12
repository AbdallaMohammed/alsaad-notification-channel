<?php

namespace Illuminate\Notifications;

use Illuminate\Notifications\Channels\AlsaadSmsChannel;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use Alsaad\Client as AlsaadClient;

class AlsaadChannelServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('alsaad', function ($app) {
                return new AlsaadSmsChannel(
                    $this->app->make(AlsaadClient::class),
                    $this->app['config']['services.alsaad.sms_from']
                );
            });
        });
    }
}
