<?php

namespace PHPBot\DesktopManager;

use PHPBot\OS\Factory as OperatingSystemFactory;

use React\EventLoop\LoopInterface;

class Factory
{
    public static function create(LoopInterface $loop)
    {
        $os = OperatingSystemFactory::createGuessingOS();
        return new DesktopManager($loop, $os);
    }
}