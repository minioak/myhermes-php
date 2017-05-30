<?php

namespace Minioak\MyHermes;

use Minioak\MyHermes\Requests\ParcelsRequest;
use Minioak\MyHermes\Requests\LabelsRequest;
use Minioak\MyHermes\Models\Factory;

final class MyHermes {

	protected $token;

	protected $sandbox = true;

	public function __construct($token, $sandbox = true) 
	{
		$this->token = $token;
		$this->sandbox = $sandbox;
	}
	
	public function parcels($parcelData)
	{
		$parcels = new ParcelsRequest($this->token, $this->sandbox);

		$data = Factory::createParcel($parcelData);

		return $parcels->execute(['parcels' => $data]);
	}

	public function label($barcode, $format = '')
	{
		$label = new LabelsRequest($this->token, $this->sandbox, $barcode, $format);

		return $label->png()->thermalFormat()->execute();
	}

}