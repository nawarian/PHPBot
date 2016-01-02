<?php

namespace PHPBot\Command\Keyboard\Linux;

use PHPBot\Command\CommandInterface;

use React\EventLoop\LoopInterface;
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
        $text = str_replace(' ', '\ ', $text);
        $cmd = new ChildProcess(
            "xdotool type --delay {$delay} {$text}"
        );

        return $cmd;
    }

    use \PHPBot\Command\Keyboard\Traits\TypeTextTrait;
}