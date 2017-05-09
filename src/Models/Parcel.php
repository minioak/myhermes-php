<?php 

namespace Minioak\MyHermes\Models;

class Parcel
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
}
