PyAutoGUI
-----------------

This is a wrapper for sending keyboard and mouse signals
under Windows operating system.

That happens mainly because we need to access the User32 API
and PHP alone cannot do that.

Instead of suffering to install a PHP Extension (wich is not the point),
this wrapper was created because Python can do it by itself AND
using `py2exe` we can compile it and still have our Windows client free
of secondary instalations (like python or other libs).