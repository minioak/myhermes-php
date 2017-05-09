<?php 

namespace Minioak\MyHermes\Models;

class ParcelDetails
{
    protected $weightKg;
    protected $itemDescription;
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
}
