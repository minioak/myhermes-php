<?php

namespace Minioak\MyHermes;

use Minioak\MyHermes\Requests\ParcelsRequest;
use Minioak\MyHermes\Requests\LabelsRequest;
use Minioak\MyHermes\Models\Factory;

final class MyHermes {

	protected $token;

	public function __construct($token) 
	{
		$this->token = $token;
	}
	
	public function parcels($parcelData)
	{
		$parcels = new ParcelsRequest($this->token);

		var_dump($parcels);
		exit();

		$data = Factory::createParcel($parcelData);

		return $parcels->execute(['parcels' => $data]);
	}

	public function label($barcode, $format = '')
	{
		$label = new LabelsRequest($this->token, $barcode, $format);

		return $label->png()->thermalFormat()->execute();
	}

}