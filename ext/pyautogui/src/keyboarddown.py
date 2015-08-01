import pyautogui
from sys import argv

args = argv[1:]

for key in args:
    pyautogui.keyDown(key)