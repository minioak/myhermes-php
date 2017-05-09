<?php 

namespace Minioak\MyHermes\Models;

class DeliveryDetails
{
    protected $deliveryAddress;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $telephone = '';
    protected $signatureRequired = false;
    protected $deliveryInstructions = '';
    protected $deliverySafePlace = '';

    public function __construct($firstName, $lastName, $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
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
