<?php

namespace MFG\Facebook\Conversion;

interface ConfigInterface
{
    public function __construct($pixelId, $accessToken);
    public function getPixelId();
    public function getAccessToken();
}