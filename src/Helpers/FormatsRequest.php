<?php

namespace Jowusu837\HubtelMerchantAccount\Helpers;

trait FormatsRequests
{
    public function toJson($object)
    {
        $json = array();
        if(!is_object($object))
        {
            throw new InvalidArgumentException('toJson formats only objects');
        }
        foreach(get_object_vars($object) as $property => $value )
        {
            if(!is_null($value))
            {
                $json[$property] = $value;
            }
        }
        return json_encode($json);
    }

    public function flattern($array)
    {
        $flattened = array();
        if(!is_array($array))
        {
            throw new InvalidArgumentException('flattern flatterns only arrays');
        }
        foreach ($array as $value) {
			if(!is_array($value))
			{
                if(!is_null($value)) $flattened[] = $value;
			}else{
				$flattened = array_merge($flattened,$this->flattern($value));
			}
        }
        return $flattened;
    }
}