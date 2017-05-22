<?php

namespace Minioak\MyHermes\Models;

use Ramsey\Uuid\Uuid;

class Factory
{
    public static function createParcel($parcelsArray)
    {
        $parcels = [];

        foreach ($parcelsArray as $data) {
            $parcelDetails = new ParcelDetails($data['weight'], $data['description']);
            $parcelDetails->estimatedParcelValuePounds = $data['value'] ?? 0;
            $parcelDetails->compensationRequiredPounds = $data['compensation'] ?? 0;


            $deliveryDetails = new DeliveryDetails($data['firstName'], $data['lastName']);

            $deliveryAddress = new DeliveryAddress($data['postcode']);
            $deliveryAddress->line1 = $data['addressLine1'] ?? null;
            $deliveryAddress->line2 = $data['addressLine2'] ?? null;
            $deliveryAddress->line3 = $data['addressLine3'] ?? null;
            $deliveryAddress->line4 = $data['addressLine4'] ?? null;
            $deliveryDetails->deliveryAddress = $deliveryAddress;

            $deliveryDetails->signatureRequired = $data['signature'] ?? false;
            $deliveryDetails->email = $data['email'] ?? '';

            $parcels[] = new Parcel(Uuid::uuid4()->toString(), $parcelDetails, $deliveryDetails);
        }

        return $parcels;
    }
}
