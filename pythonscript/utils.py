import json
import os

def fileList(path):
    arr = os.listdir(path)
    return arr

def openJson(path):
    f = open(path)
    data = json.load(f)
    return data

if __name__ == '__main__':
    main()