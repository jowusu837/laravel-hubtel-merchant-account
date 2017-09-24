<?php

namespace Jowusu837\HubtelMerchantAccount;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Jowusu837\HubtelMerchantAccount\OnlineCheckout\Request;


class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MerchantAccount::class, function () {
            return new MerchantAccount();
        });

        $this->app->alias(MerchantAccount::class, 'HubtelMerchantAccount');
        $this->app->alias(Request::class, 'OnlineCheckout');
        $this->app->alias(ReceiveMobileMoneyRequest::class, 'ReceiveMobileMoneyRequest');
    }
}