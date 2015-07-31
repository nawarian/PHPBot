<?php

namespace PHPBot;

use React\EventLoop\LoopInterface;
use React\ChildProcess\Process as ChildProcess;
use React\Promise\Deferred;

class Process extends ChildProcess
{

    protected $loop;
    protected $deferred;

    public function __construct(
        LoopInterface $loop,
        $cmd,
        $cwd = null,
        array $env = null,
        array $options = array()
    ) {
        $this->loop = $loop;
        parent::__construct($cmd, $cwd, $env, $options);
    }

    public function start($interval = 0.1)
    {
        $deferred = new Deferred();
        $this->deferred = $deferred;

        parent::start($this->loop, $interval);
        $this->on('exit', function($code) use ($deferred) {
            $deferred->resolve();
        });

        return $this->deferred->promise();
    }
}