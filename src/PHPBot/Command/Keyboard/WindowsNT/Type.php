<?php

namespace PHPBot\Command\Keyboard\WindowsNT;

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
        $command = PYAUTOGUI_BIN . "/keyboard.exe \"{$text}\"";
        $command = str_replace('/', DIRECTORY_SEPARATOR, $command);
        $command = str_replace('\\', '\\\\', $command);

        return new ChildProcess($command);
    }

    use \PHPBot\Command\Keyboard\Traits\TypeTextTrait;
}