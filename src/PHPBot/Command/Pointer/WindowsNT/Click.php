<?php

namespace PHPBot\Command\Pointer\WindowsNT;

use PHPBot\Command\CommandInterface;

use React\EventLoop\LoopInterface;
use React\ChildProcess\Process as ChildProcess;

class Click implements CommandInterface
{
    private $button;

    public function __construct($button, LoopInterface $loop)
    {
        $this->button = $button['windowsnt'];
        $this->loop = $loop;
    }

    protected function getCommand($button)
    {
        $cmd = new ChildProcess(
            PYAUTOGUI_BIN . "/mouseclick.exe {$button}"
        );

        return $cmd;
    }

    use \PHPBot\Command\Pointer\Traits\MouseClickButtonTrait;
}