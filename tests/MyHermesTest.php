<?php

use PHPUnit\Framework\TestCase;

use Minioak\MyHermes\MyHermes;

final class MyHermesTest extends TestCase
{
    public function testDispatchParcels()
    {
        $service = new MyHermes();
        $mockData = [
            'firstName' => 'John',
            'lastName' => 'Mitchell',
            'weight' => '2',
            'description' => 'My Test Delivery Item',
            'email' => 'john@email.com',
            'postcode' => 'PH1 5HJ',
            'addressLine1' => '10 Dowling Street'
        ];

        $response = $service->parcels([$mockData]);

        foreach ($response as $parcel) {
            $this->assertEquals($parcel->status, 'CREATED');
        }
    }

    public function testInvalidDispatchParcels()
    {
        $service = new MyHermes();
        $mockData = [
            'firstName' => 'John',
            'lastName' => 'Mitchell',
            'weight' => '2',
            'description' => 'My Test Delivery Item',
            'email' => 'john@email.com',
            'postcode' => '5HJ',
            'addressLine1' => '10 Dowling Street'
        ];

        try {
            $response = $service->parcels([$mockData]);
        } catch (\Exception $ex) {
            $this->assertTrue(true);
        }
    }

    public function testFetchLabel()
    {
        $service = new MyHermes();
        $mockData = [
            'firstName' => 'John',
            'lastName' => 'Mitchell',
            'weight' => '2',
            'description' => 'My Test Delivery Item',
            'email' => 'john@email.com',
            'postcode' => 'PH1 5HJ',
            'addressLine1' => '10 Dowling Street'
        ];

        $response = $service->parcels([$mockData]);

        foreach ($response as $parcel) {
            try {
                $label = $service->label($parcel->barcode);
                $this->assertNotNull($label);

                file_put_contents('output.png', $label->getContents());
            } catch (\Exception $ex) {
                $this->fail(sprintf('Failed to fetch label: %s', $ex));
            }
        }
    }
}
