import pyautogui
from sys import argv

(x, y) = pyautogui.position()
pyautogui.mousedown(x, y, button=argv[1])