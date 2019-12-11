<?php

namespace Assetku\BankService\utils;

use Assetku\BankService\Contracts\Serializeable;

/**
 * Trait Serialize array
 * 
 * @author PT Assetku mitra bangsa
 */
trait Serialize
{
    /**
     * Map serializeable to array
     * 
     * @param  Serializeable[]  $data
     * @return array
     */
    public function mapSerialize(array $data) 
    {
        return array_map(function(Serializeable $serializeable) {
            return $serializeable->toArray();
        }, $data);
    }
}
