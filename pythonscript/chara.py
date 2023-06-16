import json
import pandas as pd
f = open('characters/seele.json')

data = json.load(f)


def dataForAscension():
    data_for_each_ascension = dict()

    for num, data in enumerate(data['levelData']):
        data_for_each_ascension['promotion' + str(num)] = {"maxLevel": data['maxLevel'],
                                                           "hp_base": data['hpBase'],
                                                           "atk_base": data['attackBase'],
                                                           "def_base": data['defenseBase'],
                                                           "speed_base": data['speedBase'],
                                                           # "crit_rate_base" : data['crate'],
                                                           # "crit_damage_base" : data['cdmg'],
                                                           # "break_effect_base": 0.0,
                                                           # "stats_damage_boost_base": 0.0,
                                                           "hp_add_per_level": data['hpAdd'],
                                                           "atk_add_per_level": data['attackAdd'],
                                                           "def_add_per_level": data['defenseAdd'],
                                                           "speed_add_per_level": data['speedAdd'],
                                                           }
    for promotion in data_for_each_ascension:
        print(data_for_each_ascension[promotion])


def dataForTraces():
    minorTraces = list()
    majorTraces = list()
    for i in range(len(data['skillTreePoints'])):
        datas = data['skillTreePoints'][i]

        for line in datas:
            if line == 'embedBuff':
                minorTraces.append(datas[line])
            if line == 'embedBonusSkill':
                majorTraces.append(datas[line])
            if line == 'children' and datas[line] != []:
                dataChild = datas[line][0]
                for key in dataChild:
                    if key == 'children' and dataChild[key] != []:
                        dataInside = dataChild[key]
                        for inside in dataInside:
                            minorTraces.append(inside['embedBuff'])
                    elif key == 'embedBuff':
                        minorTraces.append(dataChild[key])

    return majorTraces, minorTraces


def tracesToHTML():
    major, minor = dataForTraces()
    possibleKeyForMinorList = [
        'Physical',
        'Fire',
        'Ice',
        'Lightning',
        'Wind',
        'Quantum',
        'Imaginary',
        'CRIT DMG',
        'CRIT RATE',
        'Effect RES',
        'Effect Hit Rate',
        'HP',
        'ATK',
        'DEF',
    ]
    minorList = list()
    majorList = list()
    for mTrace in minor:
        minortrace = ''
        for possible in possibleKeyForMinorList:
            if mTrace['statusList'][0]['key'].find(possible) != -1:
                minortrace = possible
                break;

        txt = '<button type="button" class="btn" onclick="addMinorTraces(' + f"'{minortrace}'" + ', ' + str(mTrace['statusList'][0]['value']) + ')">' + '<p>' + mTrace['name'] + ' ' + str(mTrace['statusList'][0]['value']*100) + '%' + '<p></button>'
        # print(txt)

    for majTrace in major:
        majortrace = ''
        txt = '<button type="button" class="btn" onclick="addMajorTraces(' + f"'{majTrace['name']}'" + ')">' + '<p>' + majTrace['name'] + ' ' + majTrace['descHash'] + '<p></button>'
        print(txt)


def main():
    # a,b = dataForTraces()
    # for item in b:
    #     print(item)
    tracesToHTML()

if __name__ == '__main__':
    main()
