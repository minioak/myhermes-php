<?php 

namespace Minioak\MyHermes\Models;

use \JsonSerializable;

class DeliveryDetails implements JsonSerializable
{
    protected $deliveryAddress;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $telephone = '';
    protected $signatureRequired = false;
    protected $deliveryInstructions = '';
    protected $deliverySafePlace = '';

    public function __construct($firstName, $lastName, $email = '')
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

    public function jsonSerialize()
    {
        return [
            'deliveryAddress' => $this->deliveryAddress,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'signatureRequired' => $this->signatureRequired,
            'deliveryInstructions' => $this->deliveryInstructions,
            'deliverySafePlace' => $this->deliverySafePlace
        ];
    }
}
