<?php


namespace Budbee\Model;

use \JsonSerializable;


class AdditionalServices implements JsonSerializable
{
    static $dataTypes = array(
        'identificationCheckRequired' => 'boolean',
        'recipientMinimumAge' => 'int',
        'recipientMustMatchEndCustomer' => 'boolean',
        'numberOfMissRetries' => 'null'
    );

    /**
     * @var boolean
     */
    public $identificationCheckRequired;

    /**
     * @var int
     */
    public $recipientMinimumAge;

    /**
     * @var boolean
     */
    public $recipientMustMatchEndCustomer;

    /**
     * @var
     */
    public $numberOfMissRetries;

    public function jsonSerialize()
    {
        return array(
            'identificationCheckRequired' => $this->identificationCheckRequired,
            'recipientMinimumAge' => $this->recipientMinimumAge,
            'recipientMustMatchEndCustomer' => $this->recipientMustMatchEndCustomer,
            'numberOfMissRetries' => $this->numberOfMissRetries
        );
    }

}