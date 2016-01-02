<?php

require_once 'vendor/autoload.php';

use PHPBot\DesktopManager\Factory as DesktopManagerFactory;
use PHPBot\Keyboard\Keys;
use PHPBot\Pointer\MouseButtons;

$loop = React\EventLoop\Factory::create();
$dm = DesktopManagerFactory::create($loop);

$dm ->keyboard()
    ->sendKey(Keys::ENTER())
    ->start()
    ->then(function() use ($dm) {
        echo 'enteroooou';
    });

$loop->run();