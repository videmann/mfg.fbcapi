<?php

namespace MFG\Facebook\Conversion;

use \Bitrix\Main;
use MFG\Facebook\Conversion\Api\EventResponse;

class Manager
{
    public $api;
    public $eventRequest;
    private static $pixelId;
    private static $accessToken;
    private $events = [];

    public function __construct()
    {
        if(!static::$pixelId || !static::$accessToken)
        {
            throw new Main\ArgumentException('required parameter is empty');
        }

        Api\Api::init(null, null, static::$accessToken);

        $this->api = Api\Api::instance();
        $this->eventRequest = new Api\EventRequest(static::$pixelId);
    }

    public static function useConfig(Config $config): void
    {
        static::$pixelId = $config->getPixelId();
        static::$accessToken = $config->getAccessToken();
    }

    public static function instance(): Manager
    {
        return new self();
    }

    public function addEvent(Api\Event $event): Manager
    {
        $this->events[] = $event;
        return $this;
    }

    public function fromArray(array $events): Manager
    {
        foreach ($events as $event)
        {
            $this->addEvent(
                new Api\Event($event)
            );
        }

        $this->eventRequest->setEvents(
            $this->events
        );

        return $this;
    }

    public function addEvents(array $events): Manager
    {
        $this->events = $events;
        return $this;
    }

    public function fire($testCode = false)
    {
        $onBefore = new Main\Event(ADMIN_MODULE_NAME, 'onBeforeEventRequestSend');
        $onBefore->setParameter('events', $this->events);
        $onBefore->send();

        $this->eventRequest->setEvents($this->events);

        if($testCode)
            $this->eventRequest->setTestEventCode($testCode);

        $result = $this->eventRequest->execute();

        $onAfter = new Main\Event(ADMIN_MODULE_NAME, 'onAfterEventRequestSend');
        $onAfter->setParameter('result', $result);
        $onAfter->send();

        return $result;
    }
}