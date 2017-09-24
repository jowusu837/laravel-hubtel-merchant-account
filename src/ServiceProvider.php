<?php

namespace Jowusu837\HubtelMerchantAccount;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;


class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/hubtelmerchantaccount.php';
        if (function_exists('config_path')) {
            $publishPath = config_path('hubtelmerchantaccount.php');
        } else {
            $publishPath = base_path('config/hubtelmerchantaccount.php');
        }
        $this->publishes([$configPath => $publishPath], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'hubtelmerchantaccount');

        $this->app->singleton(MerchantAccount::class, function () {
            return new MerchantAccount();
        });

        $this->app->alias(MerchantAccount::class, 'HubtelMerchantAccount');
    }

}