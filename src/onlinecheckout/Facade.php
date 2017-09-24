<?php
/**
 * Created by PhpStorm.
 * User: ProductMgr_170
 * Date: 9/24/2017
 * Time: 6:47 AM
 */

namespace Jowusu837\HubtelMerchantAccount\OnlineCheckout;


class Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'OnlineCheckoutRequest';
    }
}