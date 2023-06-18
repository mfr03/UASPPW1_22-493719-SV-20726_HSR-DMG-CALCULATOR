import json
import utils
import re

def listOfCones():
    baseQuery = "INSERT INTO `light_cones` (`cone_name_id`, `cone_path`) VALUES ("
    arr = utils.fileList('lightcones/')
    res = list()
    for item in arr:
        data = utils.openJson('lightcones/' + item)
        res.append(data['name'])
    return res

def makeQueryLightConeParams():
    baseQuery = "INSERT INTO `light_cone_base_stats_n_level` (`light_cone_base_stats_n_level_id`, `cone_name_id`, " \
                "`base_stats_hp`, `base_stats_atk`, `base_stats_def`, `hp_add_per_level`, " \
                "`atk_add_per_level`, `def_add_per_level`) VALUES ("
    arr = utils.fileList('lightcones/')
    for item in arr:
        data = utils.openJson('lightcones/' + item)
        for num, promotion in enumerate(coneData(data).values()):
            if num == 0:
                identifier = "_1_20"
            elif num == 1:
                identifier = "_20A_30"
            elif num == 2:
                identifier = "_30A_40"
            elif num == 3:
                identifier = "_40A_50"
            elif num == 4:
                identifier = "_50A_60"
            elif num == 5:
                identifier = "_60A_70"
            else:
                identifier = "_70A_80"

            name = data['name'].replace("'", r"\'")
            baseQuery += "'" + name + str(identifier) + "',"
            baseQuery += "'" + name + "',"
            baseQuery += "'" + str(promotion['hp_base']) + "',"
            baseQuery += "'" + str(promotion['atk_base']) + "',"
            baseQuery += "'" + str(promotion['def_base']) + "',"
            baseQuery += "'" + str(promotion['hp_add_per_level']) + "',"
            baseQuery += "'" + str(promotion['atk_add_per_level']) + "',"
            baseQuery += "'" + str(promotion['def_add_per_level']) + "');"
            print(baseQuery)
            baseQuery = "INSERT INTO `light_cone_base_stats_n_level` (`light_cone_base_stats_n_level_id`, `cone_name_id`, " \
                        "`base_stats_hp`, `base_stats_atk`, `base_stats_def`, `hp_add_per_level`, " \
                        "`atk_add_per_level`, `def_add_per_level`) VALUES ("

def coneData(data):
    data_for_each_ascension = dict()

    for num, data in enumerate(data['levelData']):
        data_for_each_ascension['promotion' + str(num)] = {"maxLevel": data['maxLevel'],
                                                           "hp_base": data['hpBase'],
                                                           "atk_base": data['attackBase'],
                                                           "def_base": data['defenseBase'],
                                                           # "crit_rate_base" : data['crate'],
                                                           # "crit_damage_base" : data['cdmg'],
                                                           # "break_effect_base": 0.0,
                                                           # "stats_damage_boost_base": 0.0,
                                                           "hp_add_per_level": data['hpAdd'],
                                                           "atk_add_per_level": data['attackAdd'],
                                                           "def_add_per_level": data['defenseAdd'],
                                                           }
    return data_for_each_ascension


def makeQueryDesc():
    baseQuery = "INSERT INTO `light_cone_desc` (`light_cone_desc_id`, `cone_name_id`, `cone_desc`) VALUES ("
    arr = utils.fileList('lightcones/')
    temp = list()
    for item in arr:
        data = utils.openJson('lightcones/' + item)
        for _ in range(5 ):
            desc = f'{data["skill"]["descHash"]}'
            desc = re.sub(r"<span.*?>", "", desc)
            desc = re.sub(r"</span>", "", desc)
            desc = re.sub(r"<nobr>", "", desc)
            desc = re.sub(r"</nobr>", "", desc)
            for enum, i in enumerate(data['skill']['levelData'][_]['params'], 1):
                if i % 1 == i and i < 1:
                    i = round(i * 100)
                desc = re.sub(r"#1\[i\]", f'{i}', desc)
                if enum == 2:
                    desc = re.sub(r"#2\[i\]", f'{i}', desc)

                if enum == 3:
                    desc = re.sub(r"#3\[i\]", f'{i}', desc)

                if enum == 4:
                    desc = re.sub(r"#4\[i\]", f'{i}', desc)

                if enum == 5:
                    desc = re.sub(r"#5\[i\]", f'{i}', desc)
            desc = desc.replace("'", r"\'")
            name = data['name'].replace("'", r"\'")
            baseQuery += "'" + name + str(_ + 1) + "',"
            baseQuery += "'" + name + "',"
            baseQuery += "'" + desc + "');"
            print(baseQuery)
            baseQuery = "INSERT INTO `light_cone_desc` (`light_cone_desc_id`, `cone_name_id`, `cone_desc`) VALUES ("
def makeQueryLightCone():
    baseQuery = "INSERT INTO `light_cones` (`cone_name_id`, `cone_path`) VALUES ("
    arr = utils.fileList('lightcones/')
    temp = list()
    for item in arr:
        data = utils.openJson('lightcones/' + item)
        baseQuery += f'"{data["name"]}",'
        baseQuery += f'"{data["baseType"]["name"]}");'
        print(baseQuery)
        baseQuery = "INSERT INTO `light_cones` (`cone_name_id`, `cone_path`) VALUES ("

def justkillme():
    arr = utils.fileList("lightcones/")

    for item in arr:
        data = utils.openJson("lightcones/" + item)
        temp = item.replace(".json", "")
        print("case " + f'"{temp}"' + ":" + " return " + f'"{data["name"]}";')
def main():
    justkillme()


if __name__ == '__main__':
    main()