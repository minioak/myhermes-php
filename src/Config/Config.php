<?php 

namespace Minioak\MyHermes\Config;

final class Config
{
    const SANDBOX_URL = 'https://sandbox-api.myhermes.co.uk';
    const PRODUCTION_URL = 'https://api.myhermes.co.uk';

    protected $sandbox = true;

    public function __construct($sandbox = true)
    {
        $this->sandbox = $sandbox;
    }

    public function getBaseUrl()
    {
        return $this->sandbox ? self::SANDBOX_URL : self::PRODUCTION_URL;
    }
}
