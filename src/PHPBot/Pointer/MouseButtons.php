<?php

namespace PHPBot\Pointer;

interface MouseButtons
{
    const LEFT = array(
        'linux' => 1,
        'windowsnt' => 'left'
    );

    const MIDDLE = array(
        'linux' => 2,
        'windowsnt' => 'middle'
    );
    
    const RIGHT = array(
        'linux' => 3,
        'windowsnt' => 'right'
    );

}