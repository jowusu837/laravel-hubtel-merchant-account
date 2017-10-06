<?php

namespace Jowusu837\HubtelMerchantAccount;

use Jowusu837\HubtelMerchantAccount\Helpers\SendsRequests;
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
        if (function_exists('config_path')) {
            $publishPath = config_path('hubtelmerchantaccount.php');
        } else {
            $publishPath = base_path('config/hubtelmerchantaccount.php');
        }
        $this->publishes([$this->configPath() => $publishPath], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'hubtelmerchantaccount');

        $this->app->singleton(MerchantAccount::class, function($app){
            return new MerchantAccount(new SendsRequests($app['config']->get('hubtelmerchantaccount')));
        });

        $this->app->alias(MerchantAccount::class, 'HubtelMerchantAccount');
    }

    protected function configPath() {
        return __DIR__ . '/../config/hubtelmerchantaccount.php';
    }

}