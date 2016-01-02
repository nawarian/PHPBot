# PHPBot
A PHP library for creating automation robots
--------------

This project was made for fun, feel free
to improve it :)

# Getting Started: composer
Under your project's folder type:
`$ composer require nawarian/php-bot dev-master`

```php
<?php
require_once 'vendor/autoload.php';
```

Then you are ready to go :D

# Dependencies

## Linux
PHPBot works directly with X11, using `xdotool` to
send commands. Further versions could add support to
other devices as well.

Make it independent from `xdotool` would also be nice,
projects like `https://github.com/moriyoshi/php-Xlib` are
a great shot! But still excludes MS Windows implementations...

## Windows NT
PHPBot now can work with Windows NT platforms too.
Is important to notice that: it uses compiled python files that
access the User32.dll API. Because of that, some antivirus software
might mark the files under `ext/pyautogui/bin/dest` folder as threads.

Also: the command pipeline funcionality has shown some bugs.

# Samples

All commands alone returns a `React\Promise\Promise`

## Getting started

You must have a `React\EventLoop\LoopInterface object`:

```php
$loop = React\EventLoop\Factory::create();

// Our code goes here!

$loop->run();

```

## Commands

As a `command` you can think of a interaction command, like a
button pressing, mouse moving ou clicking...

Notice that all commands will only run if:
- The `start()` method is called
- Is in a command pipeline

Is important to also notice that command pipelines will start
by the moment you create it.

## Sending keyboard commands

```php
$dm = PHPBot\DesktopManager\Factory::create($loop);
$dm->keyboard()->type('Soooo cool!')->start()->then(function() {
    // Remember, every command returns a Promise!
    echo 'Just wrote it, dude! ;)';
});
```

## Sending pointer commands
```php
$dm = PHPBot\DesktopManager\Factory::create($loop);
$dm->pointer()->moveTo(0, 0)->start()->then(function() {
    // Remember, every command returns a Promise!
    echo 'Guess where your mouse pointer is!';
});
```

## Chaining commands!
```php
$dm = PHPBot\DesktopManager\Factory::create($loop);
$dm->createCommandPipeline(
    $dm->keyboard()->type('Soooo cool!'),         // 1
    $dm->keyboard()->sendKey(Keys::ENTER()),      // 2
    $dm->pointer()->moveTo(200, 200),             // 3
    $dm->pointer()->click(MouseButtons::LEFT())   // 4
)
->start()
->then(function() {
    // This also returns a Promise, resolved when it all finishes
    echo 'DONE!';
});
```
1, 2, 3 and 4 will execute at this exaclty order!

## More samples

For more examples, check the `examples/` folder out.
--------------

Thank you :)