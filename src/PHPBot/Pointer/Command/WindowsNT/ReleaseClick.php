<?php

namespace PHPBot\Pointer\Command\WindowsNT;

use PHPBot\Process;

use React\EventLoop\LoopInterface;

class ReleaseClick extends Process
{
    public function __construct(LoopInterface $loop, $mouseButton)
    {
        $button = $mouseButton['windowsnt'];
        $command = PYAUTOGUI_BIN . "/mouseup.exe {button}";
        parent::__construct($loop, $command);
    }
}