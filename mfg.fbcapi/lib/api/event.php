<?php

namespace MFG\Facebook\Conversion\Api;

class Event extends \FacebookAds\Object\ServerSide\Event
{
    protected $request;
    public function __construct(array $data = null)
    {
        parent::__construct($data);
        $this->request = \Bitrix\Main\Context::getCurrent()->getRequest();
    }
}