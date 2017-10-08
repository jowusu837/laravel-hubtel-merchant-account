<?php

namespace Jowusu837\HubtelMerchantAccount;

class TransactionStatusRequest
{
    /**
     * The invoice token generated from an online checkout. 
     * @var string
     */
    public $invoiceToken;

    /**
     * The mobile money provider's transaction id.
     * @var string
     */
    public $networkTransactionId;

    /**
     * The transaction id provided by Hubtel.
     * @var string
     */
    public $hubtelTransactionId;
}