<?php

namespace Jowusu837\HubtelMerchantAccount;


class ReceiveMobileMoneyResponse
{
    protected $ResponseCode;
    protected $AmountAfterCharges;
    protected $TransactionId;
    protected $ClientReference;
    protected $Description;
    protected $ExternalTransactionId;
    protected $Amount;
    protected $Charges;

    public function __construct($ResponseCode, $AmountAfterCharges, $TransactionId ,
     $ClientReference, $Description , $ExternalTransactionId,
     $Amount , $Charges 
    )
     {
        $this->Amount = $Amount;
        $this->Charges = $Charges;
        $this->AmountAfterCharges = $AmountAfterCharges;
        $this->TransactionId = $TransactionId;
        $this->ResponseCode = $ResponseCode;
        $this->Description = $Description;
        $this->ClientReference = $ClientReference;
        $this->ExternalTransactionId = $ExternalTransactionId;
     }

     public function Amount()
     {
         return $this->Amount;
     }

     public function Charges()
     {
         return $this->Charges;
     }

     public function AmountAfterCharges()
     {
         return $this->AmountAfterCharges;
     }

     public function TransactionId()
     {
         return $this->TransactionId;
     }

     public function ResponseCode()
     {
         return $this->ResponseCode;
     }

     public function Description()
     {
         return $this->Description;
     }

     public function ClientReference()
     {
         return $this->ClientReference;
     }

     public function ExternalTransactionId()
     {
         return $this->ExternalTransactionId;
     }
}