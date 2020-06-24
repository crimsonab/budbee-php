<?php


namespace Budbee\Model;

use \JsonSerializable;

class ParcelRequest implements \JsonSerializable {

    static $dataTypes = array(
        'shipmentId' => 'string',
        'packageId' => 'string',
        'dimensions' => '\Budbee\Model\Dimensions'
    );

    /**
     * Shipment ID
     * @var string
     */
    public $shipmentId;

    /**
     * Package ID
     * @var string
     */
    public $packageId;

    /**
     * Dimensions
     * @var \Budbee\Model\Dimensions
     */
    public $dimensions;




    public function jsonSerialize() {
        // TODO: Implement jsonSerialize() method.
        return array(
            'shipmentId' => $this->shipmentId,
            'packageId' => $this->packageId,
            'dimensions' => $this->dimensions
        );
    }
}