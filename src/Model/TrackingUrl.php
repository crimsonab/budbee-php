<?php


namespace Budbee\Model;

use \JsonSerializable;

class TrackingUrl implements \JsonSerializable {

    static $dataTypes = array(
        'url' => 'string'
    );

    /**
     * @var string
     */
    public $url;

    public function jsonSerialize()
    {
        return array(
            'url' => $this->url

        );
    }

}