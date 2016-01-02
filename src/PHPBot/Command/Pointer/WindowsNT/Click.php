<?php

namespace PHPBot\Command\Pointer\WindowsNT;

use PHPBot\Command\CommandInterface;

use React\EventLoop\LoopInterface;
use React\Promise\Deferred;
use React\ChildProcess\Process as ChildProcess;

class Click implements CommandInterface
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
            PYAUTOGUI_BIN . "/mouseclick.exe {$button}"
        );

        return $cmd;
    }

    public function start()
    {
        $command = $this->getCommand($this->button['windowsnt']);
        $deferred = new Deferred();
        $command->start($this->loop, 0.001);

        $command->on('exit', function () use ($deferred) {
            $deferred->resolve();
        });

        return $deferred->promise();
    }
}