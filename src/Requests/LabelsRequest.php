<?php

namespace Minioak\MyHermes\Requests;

class LabelsRequest extends Request
{
    const LABEL_PDF = 'application/pdf';
    const LABEL_PNG = 'image/png';
    const LABEL_TIFF = 'image/tiff';
    const LABEL_BASE64 = ';base64=true';
    const LABEL_JSON = ',application/json';

    const LABEL_FORMAT_DEFAULT = 'DEFAULT';
    const LABEL_FORMAT_THERMAL = 'THERMAL';
    const LABEL_FORMAT_TWO_PER_PAGE = 'TWO_PER_PAGE';
    const LABEL_FORMAT_LARGE_SINGLE = 'LARGE_SINGLE';
    const LABEL_FORMAT_LARGE_MULTI = 'LARGE_MULTI';

    protected $requestType = false;

    protected $responseType = self::LABEL_PNG;

    protected $format = self::LABEL_FORMAT_DEFAULT;

    protected $base64 = true;

    protected $barcode = '';

    protected $url = '/api/labels/%s?format=%s';

    protected $method = 'GET';

    public function __construct($token, $barcode, $format)
    {
        parent::__construct($token);
        $this->barcode = $barcode;
        $this->format = $format;
    }

    public function getUrl()
    {
        return sprintf($this->url, $this->barcode, $this->format);
    }

    public function getResponseType()
    {
        $type = $this->responseType;

        if ($this->base64) {
            $type .= self::LABEL_BASE64;
        }

        return $type . self::LABEL_JSON;
    }

    public function pdf()
    {
        $this->responseType = self::LABEL_PDF;
        return $this;
    }

    public function base64()
    {
        $this->base64 = true;
        return $this;
    }

    public function binary()
    {
        $this->base64 = false;
        return $this;
    }

    public function tiff()
    {
        $this->responseType = self::LABEL_TIFF;
        return $this;
    }

    public function png()
    {
        $this->responseType = self::LABEL_PNG;
        return $this;
    }

    public function defaultFormat()
    {
        $this->format = self::LABEL_FORMAT_DEFAULT;
        return $this;
    }

    public function thermalFormat()
    {
        $this->format = self::LABEL_FORMAT_THERMAL;
        return $this;
    }

    public function twoUpFormat()
    {
        $this->format = self::LABEL_FORMAT_TWO_PER_PAGE;
        return $this;
    }

    public function largeSingleFormat()
    {
        $this->format = self::LABEL_FORMAT_LARGE_SINGLE;
        return $this;
    }

    public function largeMultiFormat()
    {
        $this->format = self::LABEL_FORMAT_LARGE_MULTI;
        return $this;
    }

    public function parse($response)
    {
        if ($response->getStatusCode() == 200) {
            return $response->getBody();
        }

        throw new \Exception($response->getBody());
    }
}
