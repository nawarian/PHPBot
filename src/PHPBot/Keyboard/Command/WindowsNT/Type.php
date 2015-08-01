<?php

namespace PHPBot\Keyboard\Command\WindowsNT;

use PHPBot\Process;

use React\EventLoop\LoopInterface;

class Type extends Process
{
    public function __construct(LoopInterface $loop, $text, $delay = 12)
    {
        $command = PYAUTOGUI_BIN . "/keyboardtype.exe \"{$text}\"";
        $command = str_replace('/', DIRECTORY_SEPARATOR, $command);
        $command = str_replace('\\', '\\\\', $command);
        parent::__construct($loop, $command);
    }
}