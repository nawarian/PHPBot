<?php

namespace PHPBot\Keyboard;

use PHPBot\OS\Factory as OS;

abstract class Keys
{
    private static $os;

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

    protected static $ALT = array(
        'Linux' => 'alt',
        'WindowsNT' => 'alt'
    );

    protected static $CTRL = array(
        'Linux' => 'ctrl',
        'WindowsNT' => 'ctrl'
    );

    protected static $TAB = array(
        'Linux' => 'Tab',
        'WindowsNT' => 'tab'
    );

    protected static $ENTER = array(
        'Linux' => 'KP_Enter',
        'WindowsNT' => 'enter'
    );

    /**
     * Function keys...
     */
    protected static $F1 = array(
        'Linux' => 'f1',
        'WindowsNT' => 'f1'
    );
    protected static $F2 = array(
        'Linux' => 'f2',
        'WindowsNT' => 'f2'
    );
    protected static $F3 = array(
        'Linux' => 'f3',
        'WindowsNT' => 'f3'
    );
    protected static $F4 = array(
        'Linux' => 'f4',
        'WindowsNT' => 'f4'
    );
    protected static $F5 = array(
        'Linux' => 'f5',
        'WindowsNT' => 'f5'
    );
    protected static $F6 = array(
        'Linux' => 'f6',
        'WindowsNT' => 'f6'
    );
    protected static $F7 = array(
        'Linux' => 'f7',
        'WindowsNT' => 'f7'
    );
    protected static $F8 = array(
        'Linux' => 'f8',
        'WindowsNT' => 'f8'
    );
    protected static $F9 = array(
        'Linux' => 'f9',
        'WindowsNT' => 'f09'
    );
    protected static $F10 = array(
        'Linux' => 'f10',
        'WindowsNT' => 'f10'
    );
    protected static $F11 = array(
        'Linux' => 'f11',
        'WindowsNT' => 'f11'
    );
    protected static $F12 = array(
        'Linux' => 'f12',
        'WindowsNT' => 'f12'
    );
}

// interface Keys
// {
// }