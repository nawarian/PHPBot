<?php

namespace PHPBot\Pointer\Command;

use PHPBot\OS;

use React\EventLoop\LoopInterface;

class Factory
{
    protected $loop;

    public function __construct(LoopInterface $loop)
    {
        $this->loop = $loop;
    }

    public function moveTo($x, $y, OS\OperationalSystem $os)
    {
        return new {$os->toNamespaceString()}\MoveTo($this->loop, $x, $y);
    }

    public function click($mouseButton, OS\OperationalSystem $os)
    {
        return new {$os->toNamespaceString()}\Click($this->loop, $mouseButton);
    }

    public function holdClick($mouseButton, OS\OperationalSystem $os)
    {
        return new {$os->toNamespaceString()}\HoldClick($this->loop, $mouseButton);
    }

    public function releaseClick($mouseButton, OS\OperationalSystem $os)
    {
        return new {$os->toNamespaceString()}\ReleaseClick($this->loop, $mouseButton);
    }
}