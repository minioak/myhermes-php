<?php

namespace Minioak\MyHermes\Requests;

use Minioak\MyHermes\Models\ParcelSummary;
use Minioak\MyHermes\Exceptions\ParcelsRequestException;

class ParcelsRequest extends Request
{
    protected $requestType = 'application/vnd.myhermes.parcels-v1+json';

    protected $responseType = 'application/vnd.myhermes.parcelsummaries-v1+json';

    protected $url = '/api/parcels';

    protected $method = 'POST';

    protected function parse($response) 
    {
    	$result = [];
    	$hasErrors = false;

    	if ($response->getStatusCode() == 200) {
    		$body = json_decode($response->getBody());
    		if ($summary = $body->parcelSummaries) {
    			foreach ($summary as $parcel) {
    				$p = new ParcelSummary($parcel->clientUID);
    				if ($parcel->status == 'CREATED') {
    					$p->setCreated();
    					$p->barcode = $parcel->barcode;
    				} else {
    					$p->setInvalid();
    					$p->errors = $parcel->errors;
    					$hasErrors = true;
    				}

    				$result[] = $p;
    			}
    		}
    	}

    	if ($hasErrors) {
    		throw new ParcelsRequestException($result);
    	}

    	return $result;
    }
}
