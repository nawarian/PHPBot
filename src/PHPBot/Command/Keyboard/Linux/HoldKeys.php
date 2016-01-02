<?php

namespace PHPBot\Command\Keyboard\Linux;

use PHPBot\Command\CommandInterface;

use React\EventLoop\LoopInterface;
use React\ChildProcess\Process as ChildProcess;

class HoldKeys implements CommandInterface
{
    private $keys;

    public function __construct(array $keys, LoopInterface $loop)
    {
        $this->keys = $this->concatKeys($keys);
        $this->loop = $loop;
    }

    protected function concatKeys(array $keys)
    {
        $keysString = '';
        foreach ($keys as $key) {
            $keysString .= (reset($keys) == $key) ? $key : "+{$key}";
        }

        return $keysString;
    }

    protected function getCommand($keys)
    {
        $keys = str_replace(' ', '\ ', $keys);
        $cmd = new ChildProcess(
            "xdotool keydown {$keys}"
        );

        return $cmd;
    }

    use \PHPBot\Command\Keyboard\Traits\MultipleButtonsStartTrait;
}