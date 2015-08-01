<?php

namespace PHPBot\OS;

class WindowsNT implements OperatingSystem
{
    public function toNamespaceString()
    {
        return 'WindowsNT';
    }
}