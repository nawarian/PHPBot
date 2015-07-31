<?php

namespace PHPBot\DesktopManager;

use React\EventLoop\LoopInterface;

class Factory
{
    public static function create(LoopInterface $loop)
    {
        return new DesktopManager($loop);
    }
}