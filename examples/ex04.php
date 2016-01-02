<?php

require_once 'vendor/autoload.php';

use PHPBot\DesktopManager\Factory as DesktopManagerFactory;
use PHPBot\Keyboard\Keys;
use PHPBot\Pointer\MouseButtons;

$loop = React\EventLoop\Factory::create();
$dm = DesktopManagerFactory::create($loop);

$dm->createCommandPipeline(
    $dm->keyboard()->sendKeys(Keys::ALT, Keys::TAB),
    $dm->pointer()->moveTo(300, 200),
    $dm->keyboard()->holdKey(Keys::CTRL),
    $dm->pointer()->holdClick(MouseButtons::LEFT),
    $dm->pointer()->moveTo(300, 680),
    $dm->pointer()->releaseClick(MouseButtons::LEFT),
    $dm->keyboard()->releaseKey(Keys::CTRL)
)
->start()
->then(function() {
    echo 'done';
});

$loop->run();