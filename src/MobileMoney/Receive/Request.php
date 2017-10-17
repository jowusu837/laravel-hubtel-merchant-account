<?php
/**
 * Created by PhpStorm.
 * User: ProductMgr_170
 * Date: 9/23/2017
 * Time: 9:04 PM
 */

namespace Jowusu837\HubtelMerchantAccount\MobileMoney\Receive;


class Request
{
    public $CustomerName;

    public $CustomerEmail;

    public $CustomerMsisdn;

    public $Channel;

    public $Amount;

    public $PrimaryCallbackURL;

    public $SecondaryCallbackURL;

    public $ClientReference;

    public $Description;

    public $Token;

    public $FeesOnCustomer;

}