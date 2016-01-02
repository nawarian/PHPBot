<?php

namespace PHPBot\Command\Pointer\Traits;

use React\Promise\Deferred;

trait MoveToTrait
{
    public function start()
    {
        $command = $this->getCommand($this->x, $this->y);
        $deferred = new Deferred();
        $command->start($this->loop, 0.001);

        $command->on('exit', function () use ($deferred) {
            $deferred->resolve();
        });

        return $deferred->promise();
    }
}