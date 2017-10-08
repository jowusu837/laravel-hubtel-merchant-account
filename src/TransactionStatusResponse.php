<?php

namespace Jowusu837\HubtelMerchantAccount;

class TransactionStatusResponse
{
    protected $ResponseCode;
    protected $StartDate;
    protected $TransactionStatus;
    protected $TransactionId;
    protected $NetworkTransactionId;
    protected $InvoiceToken;
    protected $TransactionType;
    protected $PaymentMethod;
    protected $ClientReference;
    protected $CountryCode;
    protected $CurrencyCode;
    protected $TransactionAmount;
    protected $Fee;
    protected $AmountAfterFees;
    protected $CardSchemeName;
    protected $CardNumber;
    protected $MobileNumber;
    protected $MobileChannelName;
    protected $TransactionCycle;
    protected $RelatedTransactionId;
    protected $RelatedTransactionType;
    protected $Disputed;
    protected $DisputedAmount;
    protected $DisputedAmountFee;
    protected $TotalAmountRefunded;

    public function __construct(array $response)
    {
        $this->ResponseCode = $response['ResponseCode'];
        $this->StartDate = $response['StartDate'];
        $this->TransactionStatus = $response['TransactionStatus'];
        $this->TransactionId = $response['TransactionId'];
        $this->NetworkTransactionId = $response['NetworkTransactionId'];
        $this->InvoiceToken = $response['InvoiceToken'];
        $this->TransactionType = $response['TransactionType'];
        $this->PaymentMethod = $response['PaymentMethod'];
        $this->ClientReference = $response['ClientReference'];
        $this->CountryCode = $response['CountryCode'];
        $this->CurrencyCode = $response['CurrencyCode'];
        $this->TransactionAmount = $response['TransactionAmount'];
        $this->Fee = $response['Fee'];
        $this->AmountAfterFees = $response['AmountAfterFees'];
        $this->CardSchemeName = $response['CardSchemeName'];
        $this->CardNumber = $response['CardNumber'];
        $this->MobileNumber = $response['MobileNumber'];
        $this->MobileChannelName = $response['MobileChannelName'];
        $this->TransactionCycle = $response['TransactionCycle'];
        $this->RelatedTransactionId = $response['RelatedTransactionId'];
        $this->RelatedTransactionType = $response['RelatedTransactionType'];
        $this->Disputed = $response['Disputed'];
        $this->DisputedAmount = $response['DisputedAmount'];
        $this->DisputedAmountFee = $response['DisputedAmountFee'];
        $this->TotalAmountRefunded = $response['TotalAmountRefunded'];
    }

    public function ResponseCode()
    {
        return $this->ResponseCode;
    }

    public function StartDate()
    {
        return $this->StartDate;
    }
    
    public function TransactionStatus()
    {
        return $this->TransactionStatus;
    }
    
    public function TransactionId()
    {
        return $this->TransactionId;
    }
    
    public function NetworkTransactionId()
    {
        return $this->NetworkTransactionId;
    }
    
    public function InvoiceToken()
    {
        return $this->InvoiceToken;
    }
    
    public function TransactionType()
    {
        return $this->TransactionType;
    }
    
    public function PaymentMethod()
    {
        return $this->PaymentMethod;
    }
    
    public function ClientReference()
    {
        return $this->ClientReference;
    }
    
    public function CountryCode()
    {
        return $this->CountryCode;
    }
    
    public function CurrencyCode()
    {
        return $this->CurrencyCode;
    }
    
    public function TransactionAmount()
    {
        return $this->TransactionAmount;
    }
    
    public function Fee()
    {
        return $this->Fee;
    }
    
    public function AmountAfterFees()
    {
        return $this->AmountAfterFees;
    }
    
    public function CardSchemeName()
    {
        return $this->CardSchemeName;
    }
    
    public function CardNumber()
    {
        return $this->CardNumber;
    }
    
    public function MobileNumber()
    {
        return $this->MobileNumber;
    }
    
    public function MobileChannelName()
    {
        return $this->MobileChannelName;
    }
    
    public function TransactionCycle()
    {
        return $this->TransactionCycle;
    }
    
    public function RelatedTransactionId()
    {
        return $this->RelatedTransactionId;
    }
    
    public function RelatedTransactionType()
    {
        return $this->RelatedTransactionType;
    }
    
    public function Disputed()
    {
        return $this->Disputed;
    }
    
    public function DisputedAmount()
    {
        return $this->DisputedAmount;
    }
    
    public function DisputedAmountFee()
    {
        return $this->DisputedAmountFee;
    }
    
    public function TotalAmountRefunded()
    {
        return $this->TotalAmountRefunded;
    }
}