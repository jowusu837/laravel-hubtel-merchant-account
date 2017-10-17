<?php

namespace Jowusu837\HubtelMerchantAccount\MobileMoney\Refund;

class Request
{
    /**
     * The unique ID of the mobile money 
     * transaction you want to refund.
     * @var string
     */
    public $TransactionId;
    
    /**
     * A short description of your reason for 
     * refunding the mobile money wallet.
     * @var string
     */
    public $Reason;

    /**
     * A transaction reference Id from your end.
     * @var string 
     */
    public$ClientReference;

    /**
     * The description.
     * @var string
     */
    public $Description;

    /**
     * The amount of money you're refunding.
     * @var string
     */
    public $Amount;

    /**
     * Specify if you want to make a full or
     *  a partial refund.
     * @var string
     */
    public $Full;   
}