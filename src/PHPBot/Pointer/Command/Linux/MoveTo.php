<?php

namespace PHPBot\Pointer\Command\Linux;

use PHPBot\Process;

use React\EventLoop\LoopInterface;

class MoveTo extends Process
{
    public function __construct(LoopInterface $loop, $x, $y)
    {
        $command = "xdotool mousemove --sync {$x} {$y}";
        parent::__construct($loop, $command);
    }
}