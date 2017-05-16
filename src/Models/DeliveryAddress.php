<?php 

namespace Minioak\MyHermes\Models;

use \JsonSerializable;

class DeliveryAddress implements JsonSerializable
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

    public function jsonSerialize()
    {
        return [
            'postcode' => $this->postcode,
            'line1' => $this->line1,
            'line2' => $this->line2,
            'line3' => $this->line3,
            'line4' => $this->line4
        ];
    }
}
