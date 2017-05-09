<?php 

namespace Minioak\MyHermes\Models;

class DeliveryAddress
{
    protected $postcode;
    protected $line1;
    protected $line2;
    protected $line3;
    protected $line4;

    public function __construct($postcode)
    {
        $this->postcode = $postcode;
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
