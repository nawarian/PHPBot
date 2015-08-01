import pyautogui
from sys import argv

(x, y) = pyautogui.position()
pyautogui.mouseup(x, y, button=argv[1])