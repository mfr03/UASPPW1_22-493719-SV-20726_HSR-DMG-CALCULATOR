import os
import glob
import PIL
from webptools import dwebp

arr = os.listdir(r".")

def foo(file):
    filePng = file.replace(".webp", ".png")
    filePng = "png/" + filePng
    print(filePng)
    print(dwebp(input_image=file, output_image=filePng, option='-o'))

for img in arr:
    foo(img)