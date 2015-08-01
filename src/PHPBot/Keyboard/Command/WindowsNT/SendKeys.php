<?php

namespace PHPBot\Keyboard\Command\WindowsNT;

use PHPBot\Process;

use React\EventLoop\LoopInterface;

class SendKeys extends Process
{
    public function __construct(LoopInterface $loop, array $keys)
    {
        $command = PYAUTOGUI_BIN . "/keyboardkey.exe {$this->concatKeys($keys)}";
        $command = str_replace('/', DIRECTORY_SEPARATOR, $command);
        $command = str_replace('\\', '\\\\', $command);
        parent::__construct($loop, $command);
    }

    public function concatKeys(array $keys)
    {
        $str = '';
        foreach ($keys as $key) {
            $str .= reset($keys) == $key ? $key['windowsnt'] : " {$key['windowsnt']}";
        }

        return $str;
    }
}