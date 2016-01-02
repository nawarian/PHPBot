<?php

namespace PHPBot\Keyboard;

use PHPBot\OS;

use React\EventLoop\LoopInterface;

class CommandFactory
{
    protected $loop;

    public function __construct(LoopInterface $loop)
    {
        $this->loop = $loop;
    }

    public function sendKeys(array $keys, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Command\\Keyboard\\{$os->toNamespaceString()}\\SendKeys";
        return new $className(
            $keys,
            $this->loop
        );
    }

    public function type($text, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Command\\Keyboard\\{$os->toNamespaceString()}\\Type";
        return new $className(
            $text,
            $this->loop
        );
    }

    public function holdKeys(array $keys, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Command\\Keyboard\\{$os->toNamespaceString()}\\HoldKeys";
        return new $className(
            $keys,
            $this->loop
        );
    }

    public function releaseKeys(array $keys, OS\OperatingSystem $os)
    {
        $className = "PHPBot\\Command\\Keyboard\\{$os->toNamespaceString()}\\ReleaseKeys";
        return new $className(
            $keys,
            $this->loop
        );
    }
}