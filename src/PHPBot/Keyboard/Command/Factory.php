<?php

namespace PHPBot\Keyboard\Command;

use PHPBot\OS;

use React\EventLoop\LoopInterface;

class Factory
{
    protected $loop;

    public function __construct(LoopInterface $loop)
    {
        $this->loop = $loop;
    }

    public function sendKeys(array $keys, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Keyboard\\Command\\{$os->toNamespaceString()}\\SendKeys";
        return new $className($this->loop, $keys);
    }

    public function type($text, $delay = 12, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Keyboard\\Command\\{$os->toNamespaceString()}\\Type";
        return new $className($this->loop, $text, $delay);
    }

    public function holdKeys(array $keys, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Keyboard\\Command\\{$os->toNamespaceString()}\\HoldKeys";
        return new $className($this->loop, $keys);
    }

    public function releaseKeys(array $keys, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Keyboard\\Command\\{$os->toNamespaceString()}\\ReleaseKeys";
        return new $className($this->loop, $keys);
    }
}