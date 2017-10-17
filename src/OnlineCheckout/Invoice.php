<?php

namespace Jowusu837\HubtelMerchantAccount\OnlineCheckout;


class Invoice
{
    /**
     * The individual invoice items and their associated data.
     * @var array
     */
    public $items;

    /**
     * The taxes associated with the purchase of items.
     * @var array
     */
    public $taxes;

    /**
     * The total amount of all the items. This represents the actual amount the customer pays.
     * @var double
     */
    public $total_amount;

    /**
     * A description of the invoice.
     * @var string
     */
    public $description;

    public function addItem(Item $item)
    {
        $idx = count($this->items);
        $this->items["item_$idx"] = $item;
    }

    public function removeItem($idx){
        unset($this->items["item_$idx"]);
    }
}