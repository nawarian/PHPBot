<?php

namespace PHPBot\Command\Pointer\WindowsNT;

use PHPBot\Command\CommandInterface;

use React\EventLoop\LoopInterface;
use React\Promise\Deferred;
use React\ChildProcess\Process as ChildProcess;

class MoveTo implements CommandInterface
{
    private $x;
    private $y;
    private $loop;

    public function __construct($x, $y, LoopInterface $loop)
    {
        $this->x = $x;
        $this->y = $y;
        $this->loop = $loop;
    }

    protected function getCommand($x, $y)
    {
        $cmd = new ChildProcess(
            PYAUTOGUI_BIN . "/mousemove.exe {$x} {$y}";
        );

        return $cmd;
    }

    public function start()
    {
        $command = $this->getCommand($this->x, $this->y);
        $deferred = new Deferred();
        $command->start($this->loop, 0.001);

        $command->on('exit', function () use ($deferred) {
            $deferred->resolve();
        });

        return $deferred->promise();
    }
}