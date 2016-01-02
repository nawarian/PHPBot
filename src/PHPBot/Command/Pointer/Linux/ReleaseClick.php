<?php

namespace PHPBot\Command\Pointer\Linux;

use PHPBot\Command\CommandInterface;

use React\EventLoop\LoopInterface;
use React\Promise\Deferred;
use React\ChildProcess\Process as ChildProcess;

class ReleaseClick implements CommandInterface
{
    private $button;

    public function __construct($button, LoopInterface $loop)
    {
        $this->button = $button;
        $this->loop = $loop;
    }

    protected function getCommand($button)
    {
        $cmd = new ChildProcess(
            "xdotool mouseup {$button}"
        );

        return $cmd;
    }

    public function start()
    {
        $command = $this->getCommand($this->button['linux']);
        $deferred = new Deferred();
        $command->start($this->loop, 0.001);

        $command->on('exit', function () use ($deferred) {
            $deferred->resolve();
        });

        return $deferred->promise();
    }
}