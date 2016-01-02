<?php

namespace PHPBot\Command\Keyboard\WindowsNT;

use PHPBot\Command\CommandInterface;

use React\EventLoop\LoopInterface;
use React\Promise\Deferred;
use React\ChildProcess\Process as ChildProcess;

class ReleaseKeys implements CommandInterface
{
    private $keys;

    public function __construct(array $keys, LoopInterface $loop)
    {
        $this->keys = $this->concatKeys($keys);
        $this->loop = $loop;
    }

    public function concatKeys(array $keys)
    {
        $str = '';
        foreach ($keys as $key) {
            $str .= reset($keys) == $key ? $key['windowsnt'] : " {$key['windowsnt']}";
        }

        return $str;
    }

    protected function getCommand($keys)
    {
        $command = PYAUTOGUI_BIN . "/keyboardup.exe {$this->concatKeys($keys)}";
        $command = str_replace('/', DIRECTORY_SEPARATOR, $command);
        $command = str_replace('\\', '\\\\', $command);

        return new ChildProcess($command);
    }

    use \PHPBot\Command\Keyboard\Traits\MultipleButtonsStartTrait;
}