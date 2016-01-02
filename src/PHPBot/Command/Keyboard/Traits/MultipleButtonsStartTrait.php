<?php

namespace PHPBot\Command\Keyboard\Traits;

use React\Promise\Deferred;

trait MultipleButtonsStartTrait
{
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