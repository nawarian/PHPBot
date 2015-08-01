<?php

namespace PHPBot\OS;

class Factory
{
    public static function detectOperatingSystem()
    {
        return php_uname('s');
    }

    public static function createFromOSString($os)
    {
        switch (strtolower($os)) {
            case 'windows nt':
                return new WindowsNT();
            break;
            case 'linux':
                return new Linux();
            break;
        }
    }

    public static function createGuessingOS()
    {
        return self::createFromOSString(
            self::detectOperatingSystem()
        );
    }
}