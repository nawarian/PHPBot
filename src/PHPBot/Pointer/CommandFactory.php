<?php

namespace PHPBot\Pointer;

use PHPBot\OS;

use React\EventLoop\LoopInterface;

class CommandFactory
{
    protected $loop;

    public function __construct(LoopInterface $loop)
    {
        $this->loop = $loop;
    }

    public function moveTo($x, $y, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Command\\Pointer\\{$os->toNamespaceString()}\\MoveTo";
        return new $className($x, $y, $this->loop);
    }

    public function click($mouseButton, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Command\\Pointer\\{$os->toNamespaceString()}\\Click";
        return new $className($mouseButton, $this->loop);
    }

    public function holdClick($mouseButton, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Command\\Pointer\\{$os->toNamespaceString()}\\HoldClick";
        return new $className($mouseButton, $this->loop);
    }

    public function releaseClick($mouseButton, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Command\\Pointer\\{$os->toNamespaceString()}\\ReleaseClick";
        return new $className($mouseButton, $this->loop);
    }
}