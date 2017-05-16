<?php

namespace Minioak\MyHermes\Exceptions;

class ParcelsRequestException extends \Exception
{
	protected $parcels;

	public function __construct($parcels)
	{
		$this->parcels = $parcels;
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