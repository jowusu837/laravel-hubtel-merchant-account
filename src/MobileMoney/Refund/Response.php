<?php

namespace Jowusu837\HubtelMerchantAccount\MobileMoney\Refund;

class Response
{
    protected $ResponseCode;
    protected $TransactionId;
    protected $ClientReference;
    protected $Fee;
    protected $Amount;
    protected $Date;
    protected $Status;

    public function __construct($ResponseCode, $TransactionId, $ClientReference, $Fee
    , $Amount, $Date, $Status)
    {
        $this->ResponseCode =  $ResponseCode;
        $this->TransactionId = $TransactionId;
        $this->ClientReference = $ClientReference;
        $this->Fee = $Fee;
        $this->Amount = $Amount;
        $this->Date = $Date;
        $this->Status = $Status;
    }

    public function ResponseCode()
    {
        return $this->ResponseCode;
    }

    public function TransactionId()
    {
        return $this->TransactionId;
    }

    public function ClientReference()
    {
        return $this->ClientReference;
    }

    public function Fee()
    {
        return $this->Fee;
    }

    public function Amount()
    {
        return $this->Amount;
    }

    public function Date()
    {
        return $this->Date;
    }

    public function Status()
    {
        return $this->Status;
    }
}