<?php
/**
 * Created by PhpStorm.
 * User: ProductMgr_170
 * Date: 9/23/2017
 * Time: 10:28 PM
 */

namespace Jowusu837\HubtelMerchantAccount\OnlineCheckout;


class Request
{
    /**
     * @var Invoice
     */
    public $invoice;

    /**
     * @var Store
     */
    public $store;

    /**
     * @var Actions
     */
    public $actions;

    /**
     * @var mixed
     */
    public $custom_data;
}