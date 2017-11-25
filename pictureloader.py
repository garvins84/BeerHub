import urllib
from bs4 import BeautifulSoup
import re
import mechanize
from selenium.webdriver.firefox.firefox_binary import FirefoxBinary
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
import pickle
import pdb
import time
import sys
import csv
import urllib
import win32gui
import os, os.path

class WindowMgr:
    """Encapsulates some calls to the winapi for window management"""
    def __init__ (self):
        """Constructor"""
        self._handle = None

    def find_window(self, class_name, window_name = None):
        """find a window by its class_name"""
        self._handle = win32gui.FindWindow(class_name, window_name)

    def _window_enum_callback(self, hwnd, wildcard):
        '''Pass to win32gui.EnumWindows() to check all the opened windows'''
        if re.match(wildcard, str(win32gui.GetWindowText(hwnd))) != None:
            self._handle = hwnd

    def find_window_wildcard(self, wildcard):
        self._handle = None
        win32gui.EnumWindows(self._window_enum_callback, wildcard)

    def set_foreground(self):
        """put the window in the foreground"""
        win32gui.SetForegroundWindow(self._handle)


w = WindowMgr()
skipFile = 0
path='C:/Users/Owner/Desktop/beerimage'

num_files = len([f for f in os.listdir(path)
                if os.path.isfile(os.path.join(path, f))])
urlQueryBase = "https://www.google.com/imghp?hl=en&tab=wi"
urlQuery = "https://www.google.com"
#response = urllib.urlopen(urlQueryBase)
chrome = webdriver.Chrome("C:\Python27\selenium\webdriver\chrome\chromedriver_win32\chromedriver.exe")
chrome.get(urlQueryBase)
chrome.switch_to_window(chrome.window_handles[1])
chrome.close()
chrome.switch_to_window(chrome.window_handles[0])
with open('test1.csv', 'rb') as csvfile:
        reader = csv.DictReader(csvfile)
        for row in reader:
                if (skipFile < num_files):
                        skipFile += 1
                        continue
                userInput = ""
                imageNumber = 0
                row['Name'] = unicode(row['Name'], errors='ignore')
                chrome.find_element_by_id("lst-ib").clear()
                chrome.find_element_by_id("lst-ib").send_keys(row['Name'])
                chrome.find_element_by_id("lst-ib").send_keys(u'\ue007')
                soup = BeautifulSoup(chrome.page_source)
                while(userInput != 'y'):
                        newSoup = soup.find_all(attrs={"data-ri":imageNumber})
                        for t in newSoup:
                                tag = t.find("a", {"class": "rg_l"})
                                chrome.get(urlQuery + tag['href'])
                                w.find_window(None, "*Python 2.7.13 Shell*")
                                w.set_foreground()
                                userInput = raw_input("Save this image? ")
                                if(userInput == 'y'):
                                        chrome.find_element_by_xpath("//*[@id=\"irc_cc\"]/div[2]/div[3]/div[1]/div/div[2]/table[1]/tbody/tr/td[2]/a/span").click()
                                        chrome.switch_to.window(chrome.window_handles[-1])
                                        currentUrl = chrome.current_url
                                        urllib.urlretrieve(currentUrl, "C:/Users/Owner/Desktop/beerimage/" + row['Name'] + ".jpg")
                                        chrome.close()
                                        chrome.switch_to_window(chrome.window_handles[0])
                                        w.find_window_wildcard(".*Google Image Result.*")
                                        print(w)
                                        #w.set_foreground()
                                        chrome.execute_script("window.history.go(-1)")
                                        break
                                else:
                                        imageNumber += 1
                                        w.find_window_wildcard(".*Google Image Result.*")
                                        print(w)
                                        #w.set_foreground()
                                        chrome.execute_script("window.history.go(-1)")
                                        
