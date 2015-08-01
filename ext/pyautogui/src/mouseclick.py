import pyautogui
from sys import argv

(x, y) = pyautogui.position()
pyautogui.click(x, y, clicks=1, button=argv[1])