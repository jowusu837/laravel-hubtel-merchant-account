<?php

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

    public function __construct()
    {
        $this->invoice = new Invoice();
        $this->store = new Store();
        $this->actions = new Actions();
    }
}