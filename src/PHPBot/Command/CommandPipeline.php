<?php

namespace PHPBot\Command;

use React\Promise\Deferred;
use React\Promise\PromiseInterface;

class CommandPipeline
{
    protected $commands;

    public function __construct()
    {
        $commands = func_get_args();
        $this->pipelineCommands($commands);
    }

    protected function pipelineCommands(array $commands)
    {
        $this->commandsQueue = new \SplQueue();
        array_walk($commands, [$this, 'pushCommand']);
    }

    public function pushCommand(CommandInterface $cmd)
    {
        $this->commands[] = $cmd;
    }

    public function start()
    {
        $deferred = new Deferred();
        $this->recursivelyExecuteCommands($this->commands, $deferred);

        return $deferred->promise();
    }

    protected function recursivelyExecuteCommands(
        array $commands,
        Deferred $deferred
    ) {
        $cmd = array_shift($commands);

        // If: the last command, resolve the promise :D
        if (count($commands) == 0) {
            return $cmd->start()->then(function() use ($deferred) {
                return $deferred->resolve();
            });
        }

        $cmd->start()->then(function() use ($commands, $deferred) {
            return $this->recursivelyExecuteCommands($commands, $deferred);
        });
    }
}