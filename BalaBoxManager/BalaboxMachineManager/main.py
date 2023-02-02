import downloadFile

def main():
    print("Do you want to download The Virtual Machine of Moodle with Debian 11 ? Size = 5.14 Gb (y/n)")
    answerVM = input()
    print("Do you want to download VirtualBox ? Size = 100 Mb (y/n)")
    answerVB = input()
    
    print("Do you want to download data of Ms Auriel in .img format ? Size = 1.5 Gb BUT YOU NEED 60 Gb in your PC (y/n)")
    answerMsAuriel = input()
    
    if answerVM == "y":
        print("I'm downloading the Virtual Machine of Moodle with Debian 11. Please wait...")
        downloadFile.download("https://misc.finxol.io/balabox.ova", "Moodlebox.ova")
        
    if answerVB == "y":
        print("Do you want to download VirtualBox for Windows or Linux or Mac ? (w/l/m)")
        inputOS = input()
        if (inputOS == "w"):
            print("I'm downloading VirtualBox for Windows. Please wait...")
            downloadFile.download("https://download.virtualbox.org/virtualbox/6.1.26/VirtualBox-6.1.26-145957-Win.exe", "VirtualBox.exe")
        elif (inputOS == "l"):
            print("I'm downloading VirtualBox for Linux. Please wait...")
            downloadFile.download("https://download.virtualbox.org/virtualbox/6.1.26/VirtualBox-6.1.26-145957-Linux_amd64.run", "VirtualBox.run")
        elif (inputOS == "m"):
            print("I'm downloading VirtualBox for Mac. Please wait...")
            downloadFile.download("https://download.virtualbox.org/virtualbox/6.1.26/VirtualBox-6.1.26-145957-OSX.dmg", "VirtualBox.dmg")
        else:
            print("Error : You must choose w, l or m")
    
    if (answerMsAuriel == "y"):
        print("I'm downloading data of Ms Auriel in .img format. Please wait...")
        downloadFile.download("http://misc.finxol.io/moodlebox.gz", "MoodeboxData.gz")
    


main()
        
    