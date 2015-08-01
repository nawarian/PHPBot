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

    public function moveTo($x, $y, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Pointer\\Command\\{$os->toNamespaceString()}\\MoveTo";
        return new $className($this->loop, $x, $y);
    }

    public function click($mouseButton, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Pointer\\Command\\{$os->toNamespaceString()}\\Click";
        return new $className($this->loop, $mouseButton);
    }

    public function holdClick($mouseButton, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Pointer\\Command\\{$os->toNamespaceString()}\\HoldClick";
        return new $className($this->loop, $mouseButton);
    }

    public function releaseClick($mouseButton, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Pointer\\Command\\{$os->toNamespaceString()}\\ReleaseClick";
        return new $className($this->loop, $mouseButton);
    }
}