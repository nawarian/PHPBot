<?php

namespace PHPBot\DesktopManager;

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

    public function createCommandPipeline()
    {
        $commands = func_get_args();
        foreach ($commands as $command) {
            $this->assertIsAProcess($command);
        }

        $deferred = new Deferred();
        $this->recursivelyAppendPromises($commands, $deferred);

        return $deferred->promise();
    }

    public function recursivelyAppendPromises(array $commands, Deferred $deferred)
    {
        $command = array_shift($commands);

        // If: the last command, resolve the promise :D
        if (count($commands) == 0) {
            return $deferred->resolve();
        }

        $command->start()->then(function() use ($commands, $deferred) {
            return $this->recursivelyAppendPromises($commands, $deferred);
        });
    }

    private function assertIsAProcess(Process $process)
    {}
}