<?php 

namespace Minioak\MyHermes\Models;

use \JsonSerializable;

class ParcelDetails implements JsonSerializable
{
    protected $weightKg;
    protected $itemDescription;
    protected $deliveryReference;
    protected $estimatedParcelValuePounds = 0;
    protected $compensationRequiredPounds = 0;

    public function __construct($weightKg, $itemDescription)
    {
        $this->weightKg = $weightKg;
        $this->itemDescription = $itemDescription;
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
            'weightKg' => $this->weightKg,
            'itemDescription' => substr($this->itemDescription, 0, 32),
            'estimatedParcelValuePounds' => $this->estimatedParcelValuePounds,
            'compensationRequiredPounds' => $this->compensationRequiredPounds
        ];
    }
}
