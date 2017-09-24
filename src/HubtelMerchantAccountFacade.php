<?php

namespace Jowusu837\HubtelMerchantAccount;

use Illuminate\Support\Facades\Facade as BaseFacade;


class HubtelMerchantAccountFacade extends BaseFacade
{
    protected static function getFacadeAccessor()
    {
        return 'HubtelMerchantAccount';
    }
}