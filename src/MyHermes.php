<?php

namespace Minioak\MyHermes;

use Minioak\MyHermes\Requests\ParcelsRequest;
use Minioak\MyHermes\Requests\LabelsRequest;
use Minioak\MyHermes\Models\Factory;

final class MyHermes {
	
	public function parcels($parcelData)
	{
		$parcels = new ParcelsRequest();

		$data = Factory::createParcel($parcelData);

		return $parcels->execute(['parcels' => $data]);
	}

	public function label($barcode, $format = '')
	{
		$label = new LabelsRequest($barcode, $format);

		return $label->png()->thermalFormat()->binary()->execute();
	}

}