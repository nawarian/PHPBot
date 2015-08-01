<?php

namespace PHPBot\Keyboard\Command\Linux;

use PHPBot\Process;

use React\EventLoop\LoopInterface;

class Type extends Process
{
    public function __construct(LoopInterface $loop, $text, $delay = 12)
    {
        $command = "xdotool type --delay {$delay} {$text}";
        parent::__construct($loop, $command);
    }
}