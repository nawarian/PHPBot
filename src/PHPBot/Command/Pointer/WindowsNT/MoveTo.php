<?php

namespace PHPBot\Command\Pointer\WindowsNT;

use PHPBot\Command\CommandInterface;

use React\EventLoop\LoopInterface;
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

    use \PHPBot\Command\Pointer\Traits\MoveToTrait;
}