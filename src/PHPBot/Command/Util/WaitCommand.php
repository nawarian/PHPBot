<?php

namespace PHPBot\Command\Util;

use PHPBot\Command\CommandInterface;

use React\EventLoop\LoopInterface;
use React\Promise\Deferred;

class WaitCommand implements CommandInterface
{
    protected $loop;
    protected $interval;

    public function __construct($interval, LoopInterface $loop)
    {
        $this->interval = $interval;
        $this->loop = $loop;
    }

    public function start()
    {
        $deferred = new Deferred();

        $this->loop->addTimer($this->interval, function () use ($deferred) {
            $deferred->resolve();
        });

        return $deferred->promise();
    }
}