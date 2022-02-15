<?php
require(__DIR__.'/vendor/autoload.php');

use Bitrix\Main\Config\Option;
use Bitrix\Main\Loader;

$moduleId = 'mfg.fbcapi';

$classes = [
    'MFG\\Facebook\\Conversion\\Api\\Api' => 'lib/api/api.php',
    'MFG\\Facebook\\Conversion\\Api\\Event' => 'lib/api/event.php',
    'MFG\\Facebook\\Conversion\\Api\\EventRequest' => 'lib/api/eventRequest.php',
    'MFG\\Facebook\\Conversion\\Api\\EventResponse' => 'lib/api/eventResponse.php',

    'MFG\\Facebook\\Conversion\\Manager' => 'lib/manager.php',
    'MFG\\Facebook\\Conversion\\Config' => 'lib/config.php',
    'MFG\\Facebook\\Conversion\\ConfigInterface' => 'lib/configInterface.php',
];

Loader::registerAutoloadClasses($moduleId, $classes);

\MFG\Facebook\Conversion\Manager::useConfig(
    new \MFG\Facebook\Conversion\Config(
        Option::get($moduleId, 'pixelId'),
        Option::get($moduleId, 'accessToken')
    )
);