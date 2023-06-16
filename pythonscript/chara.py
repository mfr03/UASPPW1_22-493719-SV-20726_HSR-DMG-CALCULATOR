import json
import pandas as pd
import utils
import re


def dataForAscension(data):
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


def dataForTraces(data):
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


def tracesToHTML(major, minor):
    major, minor = major, minor
    possibleKeyForMinorList = [
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
    ]
    minorList = list()
    majorList = list()
    for mTrace in minor:
        minortrace = ''
        for possible in possibleKeyForMinorList:
            if mTrace['statusList'][0]['key'].find(possible) != -1:
                minortrace = possible
                break;

        txt = '<button type="button" class="btn" onclick="addMinorTraces(' + f"'{minortrace}'" + ', ' + str(mTrace['statusList'][0]['value']) + ')">' + '<p>' + mTrace['name'] + ' ' + str(round(mTrace['statusList'][0]['value']*100)) + '%' + '</p></button>'
        txt = txt.replace("'", '"')
        minorList.append(txt)

    for majTrace in major:
        majortrace = ''
        desc = majTrace['descHash']
        desc = re.sub(r"<nobr>", "", desc)
        desc = re.sub(r"</nobr>", "", desc)
        params = majTrace['levelData'][0]['params']
        for enum, param in enumerate(params, 1):

            if param % 1 == param and param < 1:
                param = round(param * 100)
            desc = re.sub(r"#1\[i\]", f'{param}', desc)
            if enum == 2:
                desc = re.sub(r"#2\[i\]", f'{param}', desc)

        txt = '<button type="button" class="btn" onclick="addMajorTraces(' + f"'{majTrace['name']}'" + ')">' + '<p>' + majTrace['name'] + '</p><p> ' + desc + '</p></button>'
        txt = txt.replace("'", '"')
        majorList.append(txt)
    return majorList, minorList


def tracesForDB():
    arr = utils.fileList('characters/')
    nameList = [x.replace('.json', '') for x in arr]
    for enum, chara in enumerate(arr):
        major, minor = tracesToHTML(*dataForTraces(utils.openJson('characters/' + chara)))
        baseQuery = "INSERT INTO `character_traces` (`traces_id`, `major_traces`, `minor_traces`) VALUES ("
        baseQuery += "'" + nameList[enum] + '_traces' + "',"
        baseQuery += "'" + ''.join(major) + "',"
        baseQuery += "'" + ''.join(minor) + "');"
        print(baseQuery)


def bareStats():
    baseQuery = "INSERT INTO `character_base_stats_n_level` (`character_stats_n_level_id`," \
                " `character_name_id`, `base_stats_hp`, `base_stats_atk`, `base_stats_def`, `base_stats_spd`, " \
                "`hp_add_per_level`, `atk_add_per_level`, `def_add_per_level`, `stats_crit_rate_prct`, " \
                "`stats_crit_dmg_prct`) VALUES ("
    arr = utils.fileList('characters/')
    prevLevel = '1'
    for chara in arr:
        data = utils.openJson('characters/' + chara)
        for _ in range(len(data['levelData'])):
            name = data['name']
            name_id = data['name'] + "_" + str(prevLevel) + "_"+ f"{data['levelData'][_]['maxLevel']}"
            baseQuery += f"'{name_id}', "
            baseQuery += f"'{name}', "
            baseQuery += f"{data['levelData'][_]['hpBase']}, "
            baseQuery += f"{data['levelData'][_]['attackBase']}, "
            baseQuery += f"{data['levelData'][_]['defenseBase']}, "
            baseQuery += f"{data['levelData'][_]['speedBase']}, "
            baseQuery += f"{data['levelData'][_]['hpAdd']}, "
            baseQuery += f"{data['levelData'][_]['attackAdd']}, "
            baseQuery += f"{data['levelData'][_]['defenseAdd']}, "
            baseQuery += f"{data['levelData'][_]['crate']}, "
            baseQuery += f"{data['levelData'][_]['cdmg']});"
            prevLevel = str(data['levelData'][_]['maxLevel']) + "A"
            print(baseQuery)
            baseQuery = "INSERT INTO `character_base_stats_n_level` (`character_stats_n_level_id`," \
                        " `character_name_id`, `base_stats_hp`, `base_stats_atk`, `base_stats_def`, `base_stats_spd`, " \
                        "`hp_add_per_level`, `atk_add_per_level`, `def_add_per_level`, `stats_crit_rate_prct`, " \
                        "`stats_crit_dmg_prct`) VALUES ("
        prevLevel = '1'

def characters():
    arr = utils.fileList('characters/')
    baseQuery = "INSERT INTO `characters` (`character_name_id`, `character_element`, `character_path`, `traces_id`) VALUES ("
    for chara in arr:
        data = utils.openJson('characters/' + chara)
        baseQuery += f"'{data['name'].lower()}', "
        baseQuery += f"'{data['damageType']['name'].lower()}', "
        baseQuery += f"'{data['baseType']['name'].lower()}', "
        baseQuery += f"'{data['name'].lower()}_traces');"
        print(baseQuery)
        baseQuery = "INSERT INTO `characters` (`character_name_id`, `character_element`, `character_path`, `traces_id`) VALUES ("
def main():
    # a,b = dataForTraces()
    # for item in b:
    #     print(item)
    # tracesForDB()
    # bareStats()
    characters()

if __name__ == '__main__':
    main()
