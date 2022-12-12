import os
import easygui
import time


def addAllModule():
    os.system("python -m pip install pyqt5 pyqt5-tools  --use-feature=2020-resolver")
    os.system("python -m pip install easygui")
    


def UItoPY() :
    #print("We need pyuic5.exe to convert .ui to .py")
    #print("Find pyuic5.exe in your python installation folder")
    #print(r"Example : C:\Users\Micha\AppData\Local\Programs\Python\Python39\Scripts\pyuic5.exe")
    #time.sleep(2)
    #pyUIC_src = easygui.fileopenbox()
    
    pyUIC_src = r"C:\Users\Micha\AppData\Local\Programs\Python\Python39\Scripts\pyuic5.exe"
    print("Where is your .ui file ?")
    time.sleep(2)
    UI_src = easygui.fileopenbox()
    UI_src = str("\"%s\""% UI_src)
    
    pyUI_to_PY = str("\"%s\""% str(UI_src.strip("\"")[:-3] +".py"))
    os.system(pyUIC_src + " -x " + UI_src + " -o " + pyUI_to_PY)
    print(pyUIC_src + " -x " + UI_src + " -o " + pyUI_to_PY)
    


UItoPY()