import utils

def processRelics(string):
    possibleKey = [
        'Physical',
        'Fire',
        'Ice',
        'Lightning',
        'Wind',
        'Quantum',
        'Imaginary',
        'CRIT DMG',
        'CRIT Rate',
        'Effect RES',
        'Effect Hit Rate',
        'Outgoing Healing',
        'Energy Regeneration',
        'Break Effect',
        'HP',
        'ATK',
        'DEF',
        'Ultimate'
    ]
    res = list()
    for key in possibleKey:
        if string.find(key) != -1:
            res.append(key)
    return res
def main():
    for path in utils.fileList('relics/'):
        data = utils.openJson('relics/' + path)
        print(data['name'])
        if len(data['skills']) > 1:
            x = processRelics(data['skills'][0]['desc'])
            print(data['skills'][0]['desc'])
            print(x,  data['skills'][0]['params'])
            y = processRelics(data['skills'][1]['desc'])
            print(data['skills'][1]['desc'])
            print(y,  data['skills'][1]['params'])
        else:
            x = processRelics(data['skills'][0]['desc'])
            print(data['skills'][0]['desc'])
            print(x,  data['skills'][0]['params'])


if __name__ == '__main__':
    main()