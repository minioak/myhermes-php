<?php 

namespace Minioak\MyHermes\Models;

use \JsonSerializable;

class Parcel implements JsonSerializable
{
    protected $clientUID;
    protected $parcelDetails;
    protected $deliveryDetails;

    public function __construct($clientUID, $parcelDetails, $deliveryDetails)
    {
        $this->clientUID = $clientUID;
        $this->parcelDetails = $parcelDetails;
        $this->deliveryDetails = $deliveryDetails;
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    public function jsonSerialize()
    {
        return [
            'clientUID' => $this->clientUID,
            'parcelDetails' => $this->parcelDetails,
            'deliveryDetails' => $this->deliveryDetails
        ];
    }
}
