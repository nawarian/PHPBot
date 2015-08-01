<?php

namespace PHPBot\Keyboard;

interface Keys
{
    const ALT = array(
        'linux' => 'alt',
        'windowsnt' => 'alt'
    );

    const CTRL = array(
        'linux' => 'ctrl',
        'windowsnt' => 'ctrl'
    );

    const TAB = array(
        'linux' => 'Tab',
        'windowsnt' => 'tab'
    );

    const ENTER = array(
        'linux' => 'KP_Enter',
        'windowsnt' => 'enter'
    );

    /**
     * Function keys...
     */
    const F1 = array(
        'linux' => 'f1',
        'windowsnt' => 'f1'
    );
    const F2 = array(
        'linux' => 'f2',
        'windowsnt' => 'f2'
    );
    const F3 = array(
        'linux' => 'f3',
        'windowsnt' => 'f3'
    );
    const F4 = array(
        'linux' => 'f4',
        'windowsnt' => 'f4'
    );
    const F5 = array(
        'linux' => 'f5',
        'windowsnt' => 'f5'
    );
    const F6 = array(
        'linux' => 'f6',
        'windowsnt' => 'f6'
    );
    const F7 = array(
        'linux' => 'f7',
        'windowsnt' => 'f7'
    );
    const F8 = array(
        'linux' => 'f8',
        'windowsnt' => 'f8'
    );
    const F9 = array(
        'linux' => 'f9',
        'windowsnt' => 'f09'
    );
    const F10 = array(
        'linux' => 'f10',
        'windowsnt' => 'f10'
    );
    const F11 = array(
        'linux' => 'f11',
        'windowsnt' => 'f11'
    );
    const F12 = array(
        'linux' => 'f12',
        'windowsnt' => 'f12'
    );
}