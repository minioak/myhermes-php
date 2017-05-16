<?php

namespace Minioak\MyHermes\Requests;

use GuzzleHttp\Client;

use Minioak\MyHermes\Config\Config;

abstract class Request
{
    protected $requestType = false;

    protected $responseType = false;

    protected $url = false;

    protected $method = 'GET';

    protected $config = false;

    protected $client = false;

    protected $token = false;

    public function __construct($token)
    {
        $this->token = $token;
        $this->config = new Config();
        $this->client = new Client([
            'base_uri' => $this->config->getBaseUrl()
        ]);
    }

    public function getResponseType()
    {
        return $this->responseType;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function execute($body = false)
    {
        $options = [];

        if (false !== $body) {
            $options['body'] = json_encode($body);
        }

        $options['headers'] = [
            'Content-Type' => $this->requestType,
            'Accept' => $this->getResponseType(),
            'Authorization' => 'Bearer '.$token
        ];

        $response = $this->client->request($this->method, $this->getUrl(), $options);

        return $this->parse($response);
    }

    protected abstract function parse($response);
}
