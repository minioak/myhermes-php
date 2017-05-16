<?php 

namespace Minioak\MyHermes\Models;

class ParcelSummary
{
    const PARCELSUMMARY_STATUS_CREATED = 'CREATED';
    const PARCELSUMMARY_STATUS_INVALID = 'INVALID';

    protected $clientUID;
    protected $barcode;
    protected $status;
    protected $errors;

    public function __construct($clientUID)
    {
        $this->clientUID = $clientUID;
    }

    public function setCreated()
    {
        $this->status = self::PARCELSUMMARY_STATUS_CREATED;
    }

    public function setInvalid()
    {
        $this->status = self::PARCELSUMMARY_STATUS_INVALID;
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
