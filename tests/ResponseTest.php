<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;
use PHPUnit\Framework\TestCase;


final class ResponseTest extends TestCase
{

	protected $_client;

    public function setUp()
    {
        $mock = new MockHandler([
		    new Response(200, ['X-Foo' => 'Bar']),
		    new Response(202, ['Content-Length' => 0]),
		    new RequestException("Error Communicating with Server", new Request('GET', 'test'))
		]);

		$handler = HandlerStack::create($mock);
		$this->_client = new Client(['handler' => $handler]);
    }

    public function testRequest() 
    {
    	echo $this->_client->request('GET', '/')->getStatusCode();
    }
}