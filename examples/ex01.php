<?php

require_once 'vendor/autoload.php';

use PHPBot\DesktopManager\Factory as DesktopManagerFactory;
use PHPBot\Keyboard\Keys;
use PHPBot\Pointer\MouseButtons;

$loop = React\EventLoop\Factory::create();
$dm = DesktopManagerFactory::create($loop);

$pipeline = $dm->createCommandPipeline(
    $dm->keyboard()->type('gnome-terminal'),
    $dm->keyboard()->sendKey(Keys::ENTER),
    $dm->pointer()->moveTo(10, 0),
    $dm->pointer()->click(MouseButtons::LEFT)
);

$pipeline->then(function() {
    echo 'All done';
    exit;
});

$loop->run();