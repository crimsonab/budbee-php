<?php
/**
 *  Copyright 2014 Budbee AB.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */
namespace Budbee\Model;

use \JsonSerializable;

/**
 * @author Nicklas Moberg
 */
class OrderRequest implements JsonSerializable
{
    static $dataTypes = array(
        'interval' => '\Budbee\Model\OrderInterval',
        'cart' => '\Budbee\Model\Cart',
        'collectionId' => 'int',
        'delivery' => '\Budbee\Model\Contact',
        'requireSignature' => 'boolean',
        'additionalServices' => '\Budbee\Model\AdditionalServices'
    );

    /**
     * Order interval.
     * @var \Budbee\Model\OrderInterval
     */
    public $interval;

    /**
     * Cart
     * @var \Budbee\Model\Cart
     */
    public $cart;

    /**
     * Collection contact id.
     * @var int
     */
    public $collectionId;

    /**
     * Delivery contact information.
     * @var \Budbee\Model\Contact
     */
    public $delivery;

    /**
     * Delivery contact information.
     * @var boolean
     */
    public $requireSignature;

    /**
     * Additional Services
     * @var \Budbee\Model\AdditionalServices
     */
    public $additionalServices;


    public function jsonSerialize()
    {
    	return array(
    		'interval' => $this->interval,
    		'cart' => $this->cart,
    		'collectionId' => $this->collectionId,
            'delivery' => $this->delivery,
            'requireSignature' => $this->requireSignature,
            'additionalServices' => $this->additionalServices
        );
    }
}
