<?php

namespace PHPBot\DesktopManager;

use PHPBot\Command\Util\WaitCommand;
use PHPBot\Keyboard\KeyboardCommander;
use PHPBot\Pointer\PointerCommander;
use PHPBot\Process;
use PHPBot\OS\OperatingSystem;

use React\EventLoop\LoopInterface;
use React\Promise\Deferred;

class DesktopManager
{
    protected $loop;
    protected $keyboard;
    protected $pointer;
    protected $operatingSystem;

    public function __construct(LoopInterface $loop, OperatingSystem $os)
    {
        $this->keyboard = new KeyboardCommander($loop, $os);
        $this->pointer = new PointerCommander($loop, $os);
        $this->loop = $loop;
        $this->operatingSystem = $os;
    }

    public function keyboard()
    {
        return $this->keyboard;
    }

    public function pointer()
    {
        return $this->pointer;
    }

    public function wait($seconds)
    {
        return new WaitCommand($seconds, $this->loop);
    }

    public function createCommandPipeline()
    {
        $commands = func_get_args();
        $CommandPipelineClass = 'PHPBot\Command\CommandPipeline';
        return (new \ReflectionClass($CommandPipelineClass))
                ->newInstanceArgs($commands);
    }
}