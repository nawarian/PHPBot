<?php

namespace PHPBot\Keyboard;

use PHPBot\Process;
use PHPBot\OS\OperatingSystem;

use React\EventLoop\LoopInterface;

class KeyboardCommander
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

    protected function concatKeys(array $keys)
    {
        $keysString = '';
        foreach ($keys as $key) {
            $keysString .= (reset($keys) == $key) ? $key['linux'] : "+{$key['linux']}";
        }

        return $keysString;
    }

    public function sendKey($key)
    {
        return $this->sendKeys($key);
    }

    public function sendKeys()
    {
        $keys = func_get_args();
        return $this->commandFactory->sendkeys($keys, $this->operatingSystem);
    }

    public function type($text, $delay = 12)
    {
        return $this->commandFactory->type($text, $delay, $this->operatingSystem);
    }

    public function holdKey($key)
    {
        return $this->holdKeys($key);
    }

    public function holdKeys()
    {
        $keys = func_get_args();
        return $this->commandFactory->holdKeys($keys, $this->operatingSystem);
    }

    public function releaseKey($key)
    {
        return $this->releaseKeys($key);
    }

    public function releaseKeys()
    {
        $keys = func_get_args();
        return $this->commandFactory->releaseKeys($keys, $this->operatingSystem);
    }
}