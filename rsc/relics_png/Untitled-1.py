import os

def getRelicNames():
    arr = os.listdir(r".")
    temp = []

    for item in arr:
        name = list()
        for letter in item:
            if letter == "_":
                break
            else:
                name.append(letter)
        temp.append(''.join(name))
        name.clear()
    temp.remove("Untitled-1.py")
    temp = list(set(temp))
    temp.sort()
    return temp

def splitRelicIntoGroup():
    twoPieceOnly = []
    fourPieceOnly = []
    arr = os.listdir(r".")
    arr.remove("Untitled-1.py")
    for item in arr:
        if("sphere" in item or "rope" in item):
            if("sphere" in item):
                item = item.replace("_sphere.png", "")
            elif("rope" in item):
                item = item.replace("_rope.png", "")

            twoPieceOnly.append(item)
        else:
            if("body" in item):
                item = item.replace("_body.png", "")
            elif("hands" in item):
                item = item.replace("_hands.png", "")
            elif("feet" in item):
                item = item.replace("_feet.png", "")
            elif("head" in item):
                item = item.replace("_head.png", "")
                
            fourPieceOnly.append(item)

    twoPieceOnly = list(set(twoPieceOnly))
    twoPieceOnly.sort()
    fourPieceOnly = list(set(fourPieceOnly))
    fourPieceOnly.sort()
    return twoPieceOnly, fourPieceOnly


def imgElement(isTwo, relicName):
    if(isTwo):
        line1 = '<button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/hertas_sphere.png" width="64px" onclick="changeRelic(\'hertas\', \'sphere\')"></button>'
        line2 = '<button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/hertas_rope.png" width="64px" onclick="changeRelic(\'hertas\', \'rope\')"></button>'
        line1 = line1.replace('hertas', relicName)
        line2 = line2.replace('hertas', relicName)
        return line1, line2
    else:
        line1  = '<button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/bands_head.png" width="64px" onclick="changeRelic(\'bands\', \'head\')"></button>'
        line2 = '<button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/bands_body.png" width="64px" onclick="changeRelic(\'bands\', \'body\')"></button>'
        line3 = '<button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/bands_hands.png" width="64px" onclick="changeRelic(\'bands\', \'hands\')"></button>'
        line4 = '<button type="button" class="btn" data-bs-dismiss="modal"><img class="img-fluid rounded-2" src="rsc/relics_png/bands_feet.png" width="64px" onclick="changeRelic(\'bands\', \'feet\')"></button>'
        line1 = line1.replace('bands', relicName)
        line2 = line2.replace('bands', relicName)
        line3 = line3.replace('bands', relicName)
        line4 = line4.replace('bands', relicName)
        return line1, line2, line3, line4
def main():
    two, four = splitRelicIntoGroup()
    sphere = list()
    rope = list()
    head = list()
    body = list()
    hands = list()
    feet = list()
    for item in two:
        a, b = imgElement(True, item)
        sphere.append(a)
        rope.append(b)
    for item in four:
        a,b,c,d = imgElement(False, item)
        head.append(a)
        body.append(b)
        hands.append(c)
        feet.append(d)

    for item in sphere:
        print(item)
    for item in rope:
        print(item)
    for item in head:
        print(item)
    for item in body:
        print(item)
    for item in hands:
        print(item)
    for item in feet:
        print(item)
main()