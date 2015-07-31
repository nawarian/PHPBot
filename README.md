# PHPBot
A PHP library for creating automation robots
--------------

This project was made for fun, feel free
to improve it :)

# Dependencies

PHPBot works directly with X11, using `xdotool` to
send commands. Further versions could add support to
other devices as well.

Make it independent from `xdotool` would also be nice,
projects like `https://github.com/moriyoshi/php-Xlib` are
a great shot! But still excludes MS Windows implementations...

# Samples

All commands alone returns a `React\Promise\Promise`

## Getting started

You must have a `React\EventLoop\LoopInterface object`:

```php
$loop = React\EventLoop\Factory::create();

// Our code goes here!

$loop->run();

```

## Sending keyboard commands

```php
$dm = PHPBot\DesktopManager\Factory::create($loop);
$dm->keyboard()->type('Soooo cool!')->then(function() {
    // Remember, every command returns a Promise!
    echo 'Just wrote it, dude! ;)';
});
```

## Sending pointer commands
```php
$dm = PHPBot\DesktopManager\Factory::create($loop);
$dm->pointer()->moveTo(0, 0)->then(function() {
    // Remember, every command returns a Promise!
    echo 'Guess where your mouse pointer is!';
});
```

## Chaining commands!
```php
$dm = PHPBot\DesktopManager\Factory::create($loop);
$dm->createCommandPipeline(
    $dm->keyboard()->type('Soooo cool!'),       // 1
    $dm->keyboard()->sendKey(Keys::ENTER),      // 2
    $dm->pointer()->moveTo(200, 200),           // 3
    $dm->pointer()->click(MouseButtons::LEFT)   // 4
);
```
1, 2, 3 and 4 will execute at this exaclty order!

## More samples

For more examples, check the `examples/` folder out.
--------------

Thank you :)