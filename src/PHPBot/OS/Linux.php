<?php

namespace PHPBot\OS;

class Linux implements OperatingSystem
{
    public function toNamespaceString()
    {
        return 'Linux';
    }
}