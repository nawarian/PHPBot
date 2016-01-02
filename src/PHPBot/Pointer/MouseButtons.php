<?php

namespace PHPBot\Pointer;

use PHPBot\OS\Factory as OS;

abstract class MouseButtons
{
    private static $os;

    protected static $LEFT = array(
        'Linux' => 1,
        'WindowsNT' => 'left'
    );

    protected static $MIDDLE = array(
        'Linux' => 2,
        'WindowsNT' => 'middle'
    );
    
    protected static $RIGHT = array(
        'Linux' => 3,
        'WindowsNT' => 'right'
    );

    private static function OSObject()
    {
        if (!self::$os) {
            self::$os = OS::createGuessingOS();
        }

        return self::$os;
    }

    public static function __callStatic($key, $arguments)
    {
        $os = isset($arguments[0]) ? $arguments[0] : self::OSObject();

        $button = self::$$key;
        return $button[$os->toNamespaceString()];
    }
}