<?php

require_once 'vendor/autoload.php';

use PHPBot\DesktopManager\Factory as DesktopManagerFactory;
use PHPBot\Keyboard\Keys;
use PHPBot\Pointer\MouseButtons;

$loop = React\EventLoop\Factory::create();
$dm = DesktopManagerFactory::create($loop);

$dm->pointer()->moveTo(200, 200)->start()->then(function() use ($dm) {
    $dm->pointer()->moveTo(10, 0)->start()->then(function() use ($dm) {
        $dm->pointer()->click(MouseButtons::LEFT)->start()->then(function() {
            echo 'done';
        });
    });
});

$loop->run();