<?php

namespace PHPBot\Keyboard;

use PHPBot\Process;
use PHPBot\OS\OperatingSystem;

use React\EventLoop\LoopInterface;

class KeyboardCommander
{
    protected $loop;
    protected $operatingSystem;

    public function __construct(LoopInterface $loop, OperatingSystem $os)
    {
        $this->loop = $loop;
        $this->operatingSystem = $os;
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
        $command = "xdotool key {$key['linux']}";
        return new Process($this->loop, $command);
    }

    public function sendKeys()
    {
        $command = "xdotool key {$this->concatKeys(func_get_args())}";
        return new Process($this->loop, $command);
    }

    public function type($text, $delay = 12)
    {
        $command = "xdotool type --delay {$delay} {$text}";
        return new Process($this->loop, $command);
    }

    public function holdKey($key)
    {
        $command = "xdotool keydown {$this->concatKeys(func_get_args())}";
        return new Process($this->loop, $command);
    }

    public function releaseKey($key)
    {
        $command = "xdotool keyup {$this->concatKeys(func_get_args())}";
        return new Process($this->loop, $command);
    }
}