<?php

namespace PHPBot\Command\Keyboard\Traits;

use React\Promise\Deferred;

trait TypeTextTrait
{
    public function start($delay = 12)
    {
        $command = $this->getCommand($this->text, $delay);
        $deferred = new Deferred();
        $command->start($this->loop, 0.001);

        $command->on('exit', function () use ($deferred) {
            $deferred->resolve();
        });

        return $deferred->promise();
    }
}