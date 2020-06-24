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
class Order implements JsonSerializable
{
    static $dataTypes = array(
        'createdAt' => '\DateTime',
        'updatedAt' => '\DateTime',
        'id' => 'string',
        'token' => 'string',
        'interval' => '\Budbee\Model\OrderInterval',
        'cart' => '\Budbee\Model\Cart',
        'collection' => '\Budbee\Model\Contact',
        'delivery' => '\Budbee\Model\Contact',
        'signatureRequired' => 'bool',
        'additionalServices' => '\Budbee\Model\AdditionalServices',
        'parcels' => 'array[\Budbee\Model\Parcel]'
    );

    /**
     * @var \DateTime
     */
    public $createdAt;

    /**
     * @var \DateTime
     */
    public $updatedAt;

    /**
     * Order ID
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $token;

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
     * Collection contact information.
     * @var \Budbee\Model\Contact
     */
    public $collection;

    /**
     * Delivery contact information.
     * @var \Budbee\Model\Contact
     */
    public $delivery;

    /**
     * @var bool
     */
    public $signatureRequired;

    /**
     * @var \Budbee\Model\AdditionalServices
     */
    public $additionalServices;

    /**
     * @var array[\Budbee\Model\Parcel]
     */
    public $parcels;



    public function jsonSerialize()
    {
    	return array(
            'createdAt' => $this->createdAt->format('U') * 1000,
            'updatedAt' => $this->updatedAt->format('U') * 1000,
            'id' => $this->id,
            'token' => $this->token,
    		'interval' => $this->interval,
    		'cart' => $this->cart,
    		'collection' => $this->collection,
    		'delivery' => $this->delivery,
            'signatureRequired' => $this->signatureRequired,
            'additionalServices' => $this->additionalServices,
            'parcels' => $this->parcels
    	);
    }
}
