<?php

namespace PHPBot\Command\Keyboard\Linux;

use PHPBot\Command\CommandInterface;

use React\EventLoop\LoopInterface;
use React\Promise\Deferred;
use React\ChildProcess\Process as ChildProcess;

class Type implements CommandInterface
{
    private $text;

    public function __construct($textToType, LoopInterface $loop)
    {
        $this->text = (string) $textToType;
        $this->loop = $loop;
    }

    protected function getCommand($text, $delay)
    {
        $text = str_replace(' ', '\ ', $text);
        $cmd = new ChildProcess(
            "xdotool type --delay {$delay} {$text}"
        );

        return $cmd;
    }

    public function start($delay = 12)
    {
        $command = $this->getCommand($this->text, $delay);
        $deferred = new Deferred();
        $command->start($this->loop, 0.001);

        $command->on('exit', function () use ($deferred) {
            $deferred->resolve();
        });

        return $deferred->promise();
    }
}