<?php
use MFG\Facebook\Conversion;

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
\Bitrix\Main\Loader::includeModule('mfg.fbcapi');
$request = \Bitrix\Main\Context::getCurrent()->getRequest();

$result = Conversion\Manager::instance()
    ->addEvent(
        (new Conversion\Api\Event())
            ->setEventName('purchase')
            ->setEventTime(time())
            ->setUserData(
                (new \FacebookAds\Object\ServerSide\UserData())
                    ->setClientIpAddress($request->getRemoteAddress())
                    ->setClientUserAgent($request->getUserAgent())
                    ->setEmail('some@mail.ru')
                    ->setFirstName('someName')
            )
            ->setCustomData(
                (new \FacebookAds\Object\ServerSide\CustomData())
                    ->setCurrency('RUB')
                    ->setValue('144.44')
            )
    )
    ->fire('TEST97730');

\Bitrix\Main\Diag\Debug::dump($result);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');