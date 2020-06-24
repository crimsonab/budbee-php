<?php


namespace Budbee\Model;

use \JsonSerializable;

class Parcel implements \JsonSerializable {
	
	static $dataTypes = array(
	    'id' => 'int',
		'shipmentId' => 'string',
		'packageId' => 'string',
		'label' => 'string'
	);


    /**
     * ID
     * @var int
     */
    public $id;


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
     * Label url
     * @var string
     */
    public $label;

	/**
	 * @inheritDoc
	 */
	public function jsonSerialize() {
		// TODO: Implement jsonSerialize() method.
		return array(
		    'id' => $this->id,
			'shipmentId' => $this->shipmentId,
            'packageId' => $this->packageId,
            'label' => $this->label
		);
	}
}