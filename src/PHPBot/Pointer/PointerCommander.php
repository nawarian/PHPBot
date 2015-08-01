<?php

namespace PHPBot\Pointer;

use PHPBot\Process;
use PHPBot\OS\OperatingSystem;

use React\EventLoop\LoopInterface;

class PointerCommander
{
    protected $loop;
    protected $commandFactory;
    protected $operatingSystem;

    public function __construct(LoopInterface $loop, OperatingSystem $os)
    {
        $this->loop = $loop;
        $this->operatingSystem = $os;

        $this->commandFactory = new Command\Factory($this->loop);
    }

    public function moveTo($x, $y)
    {
        return $this->commandFactory->moveTo($x, $y, $this->operatingSystem);
    }

    public function click($mouseButton)
    {
        return $this->commandFactory->click($mouseButton, $this->operatingSystem);
    }

    public function holdClick($mouseButton)
    {
        return $this->commandFactory->holdClick($mouseButton, $this->operatingSystem);
    }
    public function releaseClick($mouseButton)
    {
        return $this->commandFactory->releaseClick($mouseButton, $this->operatingSystem);
    }
}