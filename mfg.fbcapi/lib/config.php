<?php

namespace MFG\Facebook\Conversion;

class Config implements ConfigInterface
{
    private $pixelId;
    private $accessToken;

    public function __construct($pixelId, $accessToken)
    {
        $this->pixelId = $pixelId;
        $this->accessToken = $accessToken;
    }

    public function getPixelId()
    {
        return $this->pixelId;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }
}