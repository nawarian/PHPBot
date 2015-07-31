<?php

namespace PHPBot\Pointer;

use PHPBot\Process;

use React\EventLoop\LoopInterface;

class PointerCommander
{
    protected $loop;

    public function __construct(LoopInterface $loop)
    {
        $this->loop = $loop;
    }

    public function moveTo($x, $y)
    {
        $command = "xdotool mousemove --sync {$x} {$y}";
        return new Process($this->loop, $command);
    }

    public function click($mouseButton)
    {
        $command = "xdotool click {$mouseButton['linux']}";
        return new Process($this->loop, $command);
    }

    public function holdClick($mouseButton)
    {
        $command = "xdotool mousedown {$mouseButton['linux']}";
        return new Process($this->loop, $command);
    }
    public function releaseClick($mouseButton)
    {
        $command = "xdotool mouseup {$mouseButton['linux']}";
        return new Process($this->loop, $command);
    }
}