from distutils.core import setup
import py2exe

setup(console=[
    '../src/mouseup.py',
    '../src/mousedown.py',
    '../src/mouseclick.py',
    '../src/mousemove.py',
    '../src/keyboarddown.py',
    '../src/keyboardkey.py',
    '../src/keyboardtype.py',
    '../src/keyboarddown.py',
    '../src/keyboardup.py',
])