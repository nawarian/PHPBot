<?php

namespace PHPBot\Pointer\Command\Linux;

use PHPBot\Process;

use React\EventLoop\LoopInterface;

class Click extends Process
{
    public function __construct(LoopInterface $loop, $mouseButton)
    {
        $button = $mouseButton['linux'];
        $command = "xdotool click {$button}";
        parent::__construct($loop, $command);
    }
}