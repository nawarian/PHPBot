<?php

namespace PHPBot\Command\Keyboard\WindowsNT;

use PHPBot\Command\CommandInterface;

use React\EventLoop\LoopInterface;
use React\Promise\Deferred;
use React\ChildProcess\Process as ChildProcess;

class SendKeys implements CommandInterface
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
        $command = PYAUTOGUI_BIN . "/keyboardkey.exe {$this->concatKeys($keys)}";
        $command = str_replace('/', DIRECTORY_SEPARATOR, $command);
        $command = str_replace('\\', '\\\\', $command);

        return new ChildProcess($command);
    }

    public function start()
    {
        $command = $this->getCommand($this->keys);
        $deferred = new Deferred();
        $command->start($this->loop, 0.001);

        $command->on('exit', function () use ($deferred) {
            $deferred->resolve();
        });

        return $deferred->promise();
    }
}